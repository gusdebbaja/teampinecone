-module(parser).

-export([save_tweet/1, couch_save_tweet/1, couch_connect/0, couch_create_db/0,couch_create_doc/4]).

-define(USERNAME, "").
-define(PASSWORD, "").
-define(OPTIONS, [{basic_auth, {?USERNAME, ?PASSWORD}}]). 
-define(URL, "http://garak.skip.chalmers.se:5984/").

%Local host:http://127.0.0.1:5984/

-define(SERVER, couchbeam:server_connection(?URL, [])).


%Parsing miner feed into tweets with '#' followed by tweet. Ex: #hello
save_tweet(Tweet) -> 
	Start = string:str(Tweet, "#"),
	case Start >= 1 of
		true  ->	seperate_tweet(string:substr(Tweet, Start+1));
		false ->	io:format("")
	end.

%Seperate the tweets accordingly
seperate_tweet(Tweet) ->
	End = string:str(Tweet, " "),
	case End >= 1 of
		true  ->	couch_save_tweet(string:to_lower(string:substr(Tweet, 1, End - 1))),
					save_tweet(string:substr(Tweet, End));
		false -> 	couch_save_tweet(string:to_lower(string:substr(Tweet, 1, length(Tweet))))
	end.
	

%Check that the characters are 'latin based' using chars a,A to z,Z and numbers 0 to 9
is_alpha([Char | Rest]) when Char >= $a, Char =< $z ->
    is_alpha(Rest);	
is_alpha([Char | Rest]) when Char >= $A, Char =< $Z ->
    is_alpha(Rest);
is_alpha([Char | Rest]) when Char >= $0, Char =< $9 ->
    is_alpha(Rest);
is_alpha([]) ->
    true;
is_alpha(_) ->
    false.
	
couch_save_tweet(Hashtag) ->
	Options = [],
	Db = couch_open_db(),
    case is_alpha(string:strip(Hashtag)) of
        true ->	io:format(Hashtag ++ "~n"),
        		{Status,Doc} = couchbeam:open_doc(Db, Hashtag),
        		case Status of
        			ok ->
        						{[{_, Ids},{_,_},{_,Uses},{_,Owners}]} = Doc,
        						NewUses = Uses + 1,
        						couchbeam:delete_doc(Db, Doc),
        						couch_create_doc(Db, unicode:characters_to_list(Ids,unicode), NewUses, unicode:characters_to_list(Owners,unicode));
        			error ->	couch_create_doc(Db, Hashtag, 1, "no_owner")
        			
        		end;
        false -> io:format("")
    end.
    
bin_to_num(Bin) ->
    N = binary_to_list(Bin),
    case string:to_float(N) of
        {error,no_float} -> list_to_integer(N);
        {F,_Rest} -> F
    end.
    
    %Num to bin list_to_binary(integer_to_list(543)).
    
%Managing the couchDB on server
%Connect to futon via http://garak.skip.chalmers.se:5984/_utils/

%Create DB
couch_create_db() -> 
	Options = [],
	Server = ?SERVER,
	{ok, _Version} = couchbeam:server_info(Server),
	{ok, Db} = couchbeam:create_db(Server, "pinecone_tweets_db", Options).

%Open DB
couch_open_db() -> 
	Options = [],
	{ok, _Version} = couchbeam:server_info(?SERVER),
	{ok, Db} = couchbeam:open_db(?SERVER, "pinecone_tweets_db", Options),
	Db.

%Create DB document for each tweet
couch_create_doc(DB, Hashtag, Uses, Owner) ->
	Doc = {[{<<"_id">>, unicode:characters_to_binary(Hashtag, unicode)},
	   		{<<"uses">>, Uses},
	   		{<<"Owner">>, unicode:characters_to_binary(Owner, unicode)}]},
   {ok, Doc1} = couchbeam:save_doc(DB, Doc).

%Connect to DB
couch_connect() -> 
	Server = ?SERVER,
	{ok, _Version} = couchbeam:server_info(Server),
	Db = couch_open_db(),
	{Status,Doc} = couchbeam:open_doc(Db, "mtvstar"),
	couchbeam:delete_doc(Db, Doc).