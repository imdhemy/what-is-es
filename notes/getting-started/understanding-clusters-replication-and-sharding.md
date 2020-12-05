# Understanding clusters, replication, and sharding
You need one or more nodes running to have a cluster. To test an effective cluster, you need at least two nodes.

An **index** can have one or more replicas; the shards are called **primary** if they are part of the primary replica
, and **secondary** if they are part of replicas.

To maintain **consistency** in **write** operations:
- The write operation is first executed in the primary shard.
- If the primary write is successfully done, it is propagated simultaneously in all the secondary shards.
- If a primary shard becomes unavailable, a secondary one is elected as primary (if available) and then the flow is
 re-executed.
 
