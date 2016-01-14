-module(moduleparser).

-export([startCouch/0, serverInfo/0]).

-define(CONNECTION, "http://localhost:5984").
-define(OPTIONS, []).
-define(SERVER, couchbeam:server_connection(?CONNECTION, ?OPTIONS)).

%%inside couchbeam-master
%% erl -pa ebin -pa deps/*/ebin
%%application:ensure_all_started(couchbeam). (If running from shell).

%Start all couchbeam dependencies and send a message to confirm startup.
startCouch() ->
application:start(asn1),
application:start(crypto),
application:start(public_key),
application:start(ssl),
application:start(idna),
application:start(mimerl),
application:start(certifi),
application:start(hackney),
application:start(couchbeam),
io:fwrite("Connection to couchbeam established(\n").

% Connect to desired server and return the relevant server info.
serverInfo() ->
couchbeam:server_info(?SERVER).
