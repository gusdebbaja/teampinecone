# Twitter Streams Example in Erlang

A simple Erlang/OTP gen_server example that connects to Twitters public streaming API https://stream.twitter.com/1.1/statuses/filter.json

Extended to process messages, send through http POST.

## Dependencies

You will need rebar to get the dependencies

## Installation

    Install and set up env path for erlang 6.0 (otp_win64_17.0 @ https://www.erlang-solutions.com/downloads/download-erlang-otp)
    Get rebar from https://github.com/basho/rebar - You might need Microsoft Visual Studio to build rebar

    cd twitter_streams
    rebar get-deps

## Configuration

Edit src/twitter_streams_client.erl and enter your four Twitter keys

    -define(CONSUMER_KEY, "XXXXXXXXX").
    -define(CONSUMER_SECRET, "XXXXXXXXX").
    -define(ACCESS_TOKEN, "XXXXXXXXX").
    -define(ACCESS_TOKEN_SECRET, "XXXXXXXXX").
    -define(NODEJS_TWEET_POST_URL, "Where are sending the post request"). If using the same server, make sure your nodejs server is on a different port than 80 (e.g. use 8080 for listening)

## Compile

From the project root directory run

    rebar compile

## Running

From the project root directory run

    erl -pa ebin deps/oauth/ebin deps/json/ebin deps/jsx/ebin deps/jsonpointer/ebin -s ssl -s inets -s crypto

Once in the Erlang shell run

1> application:start(jsx).
ok
2> application:start(jsonpointer).
ok
3> application:start(json).
ok
4> application:start(oauth).
ok
5> application:start(twitter_streams).
ok

At this point any incomming tweet will be processed and sent through HTTPC POST. 
You should see - We succesfully sent it and got back: {some json sent back} - for each tweet.

## Notes:

If you decide to use bson for some reason, try tag v0.2 if it gives you an error. Make sure you have {'bson', ".*", {git, "https://github.com/comtihon/bson-erlang", {tag, "v0.2"}}} on the top of your list in your main rebar.config

---

After downloading pbkdf2 go into deps/pbkdf2/rebar.config and remove the following

%% Ensure the ebin directory exists before we try to put files there.
{pre_hooks, [
    {compile, "mkdir -p ebin"}
]}.

When compiling i was getting this error under Windows 8.1, so that should fix it:
A subdirectory or file ebin already exists.
Error occurred while processing: ebin.
ERROR: Command [compile] failed!

## Credits

Originally written by Jeremy Howard @ https://github.com/fishoutawata

Martin Logan, Eric Merritt and Richard Carlsson for their book **Erlang and OTP in Action**

Tim Fletcher for his OAuth module for Erlang **https://github.com/tim/erlang-oauth**

## License

MIT
