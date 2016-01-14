-module( translator ).

-export([couch_save_tweet/1, couch_create_db/0,couch_create_doc/3, couch_get_uses/1]).

-define(USERNAME, "").
-define(PASSWORD, "").
-define(OPTIONS, [{basic_auth, {?USERNAME, ?PASSWORD}}]). 
-define(URL, "http://garak.skip.chalmers.se:5984/").

%Local host:http://127.0.0.1:5984/

-define(SERVER, couchbeam:server_connection(?URL, [])).

%Managing the couchDB on server
%Connect to futon via http://garak.skip.chalmers.se:5984/_utils/

%Create DB
couch_create_db() -> 
	Options = [],
	Server = ?SERVER,
	{ok, _Version} = couchbeam:server_info(Server),
	couchbeam:create_db(Server, "pinecone_tweets_db", Options).

%Open DB
couch_open_db() -> 
	Options = [],
	couchbeam:server_info(?SERVER),
	{ok, Db} = couchbeam:open_db(?SERVER, "pinecone_tweets_db", Options),
	Db.

%Create DB document for each tweet
couch_create_doc(DB, Hashtag, Uses) ->
	Doc = {[{<<"_id">>, unicode:characters_to_binary(Hashtag, unicode)},
	   		{<<"uses">>, Uses}]},
   couchbeam:save_doc(DB, Doc).
	
		
couch_save_tweet(Hashtag) ->
	Db = couch_open_db(),
    
    {Status, Doc} = couchbeam:open_doc(Db, Hashtag),
    case Status of
    	ok ->
    		{[{_, Ids},{_,_},{_,Uses}]} = Doc,
    		NewUses = Uses + 1,
    		couchbeam:delete_doc(Db, Doc),
    		couch_create_doc(Db, unicode:characters_to_list(Ids,unicode), NewUses);
        error ->	couch_create_doc(Db, Hashtag, 1)
    end.
    
couch_get_uses(Hashtag) ->
	Db = couch_open_db(),
	{Status, Doc} = couchbeam:open_doc(Db, Hashtag),
    case Status of
    	ok ->
    		{[{_, _},{_,_},{_,Uses}]} = Doc;
    	error ->
    	    Uses = 0
    end,
    Uses.

