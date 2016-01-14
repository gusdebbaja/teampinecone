-module(parser).

-export([save_tweet/1, get_lowest_above_zero/1]).



%Parsing miner feed into tweets with '#' followed by tweet. Ex: #hello
save_tweet(Tweet) -> 
	Start = string:str(Tweet, "#"),
	case Start >= 1 of
		true  ->	seperate_tweet(string:substr(Tweet, Start+1));
		false -> ok
	end.

%Seperate the tweets accordingly
seperate_tweet(Tweet) ->
	List = [string:str(Tweet, " "), string:str(Tweet, "."), string:str(Tweet, ","), string:str(Tweet, "#"), string:str(Tweet, "'")],
	End = get_lowest_above_zero(List),
	case End > 0 of
		true  ->	save_hashtag(string:to_lower(string:substr(Tweet, 1, End - 1))),
					save_tweet(string:substr(Tweet, End));
		false -> 	save_hashtag(string:to_lower(string:substr(Tweet, 1, length(Tweet))))
	end.
	



save_hashtag(Hashtag) ->
	case is_alpha(string:strip(Hashtag)) of
	true ->
			io:format(Hashtag),
			translator:couch_save_tweet(Hashtag);
	false -> ok
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

get_lowest_above_zero([H|[]]) ->
	H;
get_lowest_above_zero([H|[HT|TT]]) when H > 0 ->
	case H < HT of
		true ->
			get_lowest_above_zero([H|TT]);
		false ->
			case HT > 0 of
				true ->
					get_lowest_above_zero([HT|TT]);
				false ->
					get_lowest_above_zero([H|TT])
			end
	end;
get_lowest_above_zero([_|L]) ->
	get_lowest_above_zero(L).