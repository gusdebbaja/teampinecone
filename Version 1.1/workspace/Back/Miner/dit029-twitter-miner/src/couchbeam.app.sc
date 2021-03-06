%%% -*- erlang -*-
%%%
%%% This file is part of couchbeam released under the MIT license.
%%% See the NOTICE for more information.

{application, couchbeam,
 [{description, "Erlang CouchDB client"},
  {vsn, "1.2.1"},
  {modules, []},
  {registered, [
    couchbeam_sup
  ]},
  {applications, [kernel,
                  stdlib,
                  asn1,
                  crypto,
                  public_key,
                  ssl,
                  idna,
                  hackney,
                  couchbeam]},
  {included_applications, []},
  {env, []},
  {mod, { couchbeam_app, []}}
 ]
}.
