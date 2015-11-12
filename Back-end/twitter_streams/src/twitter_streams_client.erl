%%%----------------------------------------------------------------------------
%%% @author Jeremy Howard <fishoutawata@gmail.com>
%%% @copyright 2015
%%% @doc Twitter Public API Streaming Client.  This module connects to
%%%      Twitter's public streaming api at
%%%      https://stream.twitter.com/1.1/statuses/filter.json
%%% @end
%%%----------------------------------------------------------------------------
-module(twitter_streams_client).

-behaviour(gen_server).

%% API
-export([start_link/0, stop/0]).

%% gen_server callbacks
-export([init/1, handle_call/3, handle_cast/2, handle_info/2,
         terminate/2, code_change/3]).

-define(CONSUMER_KEY, "znbm8mosUjtdThyx1jjAhUQK7").
-define(CONSUMER_SECRET, "VEVRR7hVaY4vBX1yyHavwHvA0moWgxJsBxh4DwHzRMWq4rUgSe").
-define(ACCESS_TOKEN, "3862041801-7bjeKxSMp65t6pslzcLd7dpAYHWuvnZGdvCIs40").
-define(ACCESS_TOKEN_SECRET, "tRPsyihW9OmQfoOVh3eND063MSazMrzumkDigrASrXUbV").
% Modify this to indicate where we send the processed tweets
-define(NODEJS_TWEET_POST_URL, "http://garak.skip.chalmers.se:5984/_utils/document.html?team_pinecone_db/8bf0f981d20983d6f950eb3e50000254").

-record(state, {tweet}).

%%%============================================================================
%%% API
%%%============================================================================

%%-----------------------------------------------------------------------------
%% @doc Starts the client
%%
%% @spec start_link() -> {ok, Pid}
%% where
%%  Pid = pid()
%% @end
%%-----------------------------------------------------------------------------
start_link() ->
    gen_server:start_link({local, ?MODULE}, ?MODULE, [], []).

%%-----------------------------------------------------------------------------
%% @doc Stops the client
%%
%% @spec stop() -> ok
%% @end
%%-----------------------------------------------------------------------------
stop() ->
    gen_server:cast(?MODULE, stop).

%%%============================================================================
%%% gen_server callbacks
%%%============================================================================
init([]) ->
    Consumer = {
        ?CONSUMER_KEY,
        ?CONSUMER_SECRET,
        hmac_sha1
    },
    oauth:post("https://stream.twitter.com/1.1/statuses/filter.json",
        [{"track","cats,cheese"}], Consumer, ?ACCESS_TOKEN,
        ?ACCESS_TOKEN_SECRET, [{sync, false},{stream, self}]
    ),
    {ok, #state{tweet = []}}.

handle_call(_Request, _From, State) ->
    {noreply, State}.

handle_cast(stop, State) ->
    {stop, normal, State}.

handle_info({http, {_RequestId, stream_start, _Headers}}, State) ->
    {noreply, State};
handle_info({http, {_RequestId, stream, BinBodyPart}}, State) ->
    case re:run(BinBodyPart, <<"\\r\\n$">>, [dotall]) of
      nomatch ->
        TweetPart = lists:append(State#state.tweet, [BinBodyPart]),
        {noreply, State#state{tweet = TweetPart}};
      {match, _} ->
        TweetPart = lists:append(State#state.tweet, [BinBodyPart]),
        Tweet = << <<B/bits>> || B <- TweetPart >>,

        % Sergiu : ==================
        JSONTweet = json:from_binary(Tweet),

        TW_Text = json:get([text], JSONTweet),
        TW_Created_at = json:get([created_at], JSONTweet),
        TW_User = json:get([user,name],JSONTweet),

        % using modules json, jsx or jiffy was a PITA to send. So i built the JSON string "manually":
        FinalList = lists:concat(["tweetAuthor=", binary_to_list(TW_User), "&tweetDate=", binary_to_list(TW_Created_at), "&tweetContent=", binary_to_list(TW_Text)]),

        sendToNodeJS(FinalList),

        % End Sergiu : ==================

        {noreply, State#state{tweet = []}}
    end;
handle_info({http, {_RequestId, stream_end, _Headers}}, State) ->
    io:format("stream_end~n"),
    {noreply, State}.

terminate(_Reason, _State) ->
    ok.

code_change(_OldVsn, State, _Extra) ->
    {ok, State}.

% Sergiu : ==================
sendToNodeJS(TheList) ->
    Url = ?NODEJS_TWEET_POST_URL,
    Method = post,
    Body = TheList,
    Request = {Url, [], "application/x-www-form-urlencoded", Body},
    {Code, Result} = httpc:request(Method, Request, [], []),
    case Code of
        error ->
            io:format("~p. The result is: ~p~n", ["Authenticate error",Result]),
            false;
        ok ->
            {_, _, Content} = Result,

            %{ok, {struct, Results}} = json2:decode_string(Content),
            %_ReturnCode = proplists:get_value("code", Results),

            io:format("We succesfully sent it and got back: ~p~n", [Content]),
            %io:format("Code: ~p~n", [_ReturnCode]),
            true
    end.
% End Sergiu : ==================
