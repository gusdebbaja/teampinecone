
    
    -module( pong ).
-export( [ start/0, pong/0 ] ).

start() ->
   application:ensure_all_started(twitterminer),
   Mypid = spawn( pong, pong, [ ] ),
    register( pong, Mypid).

pong() ->
    receive
        [Pid, X] ->
        P = lists:flatten(io_lib:format("~p", [translator:couch_get_uses(X)])),
        Pid! [self(), P],
        pong();
        quit -> ok
       
    end.
    
    
int_to_string([], List) ->
    List;
    
int_to_string(Int, List) ->
    Temp = Int div 10,
    Rem = Int rem 10,
    int_to_string(Temp, [Rem + 48 | List]).
    
    
