
-module( bridge ).
-export( [ start/0, pong/0 ,sleep/1] ).


start() ->
    Mypid = spawn( bridge, pong, [ ] ),
    register( bridge, Mypid),pong().

sleep(T) -> 
receive 
after  T ->  true  
end.

pong() ->

    receive
        quit -> ok;
        
        X -> 
            io:format("Got " ++ X),
            io:format(translator:couch_get_uses(X)),
            sleep(200),
            pong()
    end.
    
    
