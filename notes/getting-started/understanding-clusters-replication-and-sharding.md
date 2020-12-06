# Understanding clusters, replication, and sharding
You need one or more nodes running to have a cluster. To test an effective cluster, you need at least two nodes.

An **index** can have one or more replicas; the shards are called **primary** if they are part of the primary replica
, and **secondary** if they are part of replicas.

To maintain **consistency** in **write** operations:
- The write operation is first executed in the primary shard.
- If the primary write is successfully done, it is propagated simultaneously in all the secondary shards.
- If a primary shard becomes unavailable, a secondary one is elected as primary (if available) and then the flow is
 re-executed.
 
**During search operations**, if there are some replicas, a valid set of shards is chosen **randomly** between
 primary and secondary to improve its performance. For **reliability**, replicas are allocated in a way that if a
  single node becomes unavailable, there is always at least one replica of each shard that is still available on the
   remaining nodes.
   
To prevent data loss and to have high availability, it's good to have a least one replica; so your system can survice
 a node filaure without downtime and without loss of data.


## Cluster Status
The **cluster status** shows you information on the health of your cluster:
- <strong><font color='green'>Green</font></strong>: everything is okay.
- <strong><font color='yellow'>Yellow</font></strong>: some shards are missing, but you can work on your cluster.
- <strong><font color='red'>Red</font></strong>: indicates a problem as some primary shards are missing.

### Solving the yellow status
Mainly, yellow status is due to some shards that are not allocated.
- If your cluster is in the **recovery status**, you need to wait until the shards' startup process ends.
- If your cluster is **always** in the yellow state, you may not have enough nodes to contain your replicas.
    + you can reduce the number of your replicas.
    + or add the required number of nodes.
### Solving the red status
This means you are experiencing lost data, the cause of which is that one or more **shards are missing**.

- If your node restarts, and the system goes back to the yellow or green status, then you are safe.
- Otherwise, you have obviously lost data and your cluster is not usable,
    * delete the index/indices and restore them from backups.
    
<p dir="rtl">Next: <a href="./communicating-with-elasticsearch..md">Communicating with ElasticSearch</a></p>
