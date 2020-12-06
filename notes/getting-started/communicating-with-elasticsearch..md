# Communicating with ElasticSearch
Every protocol has advantages and disadvantages. It's important yo choose the correct one depending on the kind of
 the applications you are developing. It you are in doubt, choose the **HTTP Protocol** layer that is the standard
  protocol and is easy to use.
 
| Protocol | Advantages | Disadvantages | Type |
| --- | --- | --- | --- |
| Http | <ul><li>Frequently used</li><li>Api safe</li></ul> | <ul><li>HTTP overhead</li></ul> | Text |
| Native |<ul><li>Fast network layer</li><li>Programmatic</li><li>best for massive indexing operations</li></ul> | <ul><li>If the API changes, it can break the applications.</li><li>Requires the same version of the ES server</li><li>Only on JVM</li></ul> | Binary |
| Thrift | Similar to HTTP | Related to the Thrift Plugin | Binary |


