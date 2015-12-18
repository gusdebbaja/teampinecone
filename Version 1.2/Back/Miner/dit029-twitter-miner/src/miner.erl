-module(miner).


-export([start/0]).

start() ->
    application:ensure_all_started(twitterminer),
        P = spawn_link(fun miner_run/0),
    miner(P).


    
miner(Process) ->
     %Run miner for 10 seconds, restart it. If error, then restart twitter_example().
    spawn(fun() ->
        receive
          cancel -> ok
          
        after 10000 -> % Run for 10s
            case process_info(Process) of 
            undefined -> P = spawn_link(fun miner_run/0),
            io:format("miner process stopped starting new process"),
            miner(P);
            _ -> miner(Process)
            end
        end
        end).
    
miner_run() ->
    twitterminer_source:twitter_example().
    

