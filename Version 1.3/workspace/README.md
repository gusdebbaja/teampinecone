Team Pinecone

Connect to CouchDB Futon Server:
http://garak.skip.chalmers.se:5984/_utils/

Connect to website:
https://pinecone-bryndlir.c9users.io/Front/Website/index.php

Connect to server website: (Not main website)
http://garak.skip.chalmers.se/

Server Information
group: pinecone

ip:  129.16.155.40 
dns: GARAK.SKIP.CHALMERS.SE

username: pinecone
password: hR5FdE2Q

How to run the miner:
1. Make sure you are in Back/Miner/dit029-twitter-miner
1. $ erl -pa deps/*/ebin -pa ebin -config twitterminer
2. $ miner:start().

How to run the Query manager:
1. Make sure you are in the Back/Miner/dit029-twitter-miner folder.
2. $ erl -pa deps/*/ebin -pa ebin -config twitterminer -sname Something -setcookie abc
3. $ pong:start().

Website Workspace is available at: https://ide.c9.io/bryndlir/pinecone
Cloud9 workspace offers File Revision History Feature where the changes are displayed chronologically.

All the UI of the website is using the bootstrap library for a more appealing look, 
hence the libraries are important in the beginning each page. 