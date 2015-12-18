-module(parser).

-export([save_tweet/1, couch_connect/0]).

-define(USERNAME, "").
-define(PASSWORD, "").
-define(OPTIONS, [{basic_auth, {UserName, Password}}]). 
-define(URL, "129.16.155.40").
%
-define(SERVER, couchbeam:server_connection(URL, OPTIONS)).

save_tweet(Tweet) -> 
	Start = string:str(Tweet, "#"),
	case Start >= 1 of
		true  ->	seperate_tweet(string:substr(Tweet, Start));
		false ->	io:format("")
	end.

seperate_tweet(Tweet) ->
	End = string:str(Tweet, " "),
	case End >= 1 of
		true  ->	couch_save_tweet(string:substr(Tweet, 1, End - 1)),
					save_tweet(string:substr(Tweet, End));
		false -> 	couch_save_tweet(string:substr(Tweet, 1,	length(Tweet)))
	end.


couch_save_tweet(Hashtag) -> io:format(list_to_binary(Hashtag ++ "~n")).

couch_create_db(Server) -> 
	Options = [],
	{ok, _Version} = couchbeam:server_info(Server),
	{ok, Db} = couchbeam:create_db(Server, "hashtags", Options).

couch_open_db(Server) -> 
	Options = [],
	{ok, _Version} = couchbeam:server_info(Server),
	{ok, Db} = couchbeam:open_db(Server, "testdbparser", Options).

couch_connect() -> 
	couchbeam:start(),
	{ok, _Version} = couchbeam:server_info(SERVER),