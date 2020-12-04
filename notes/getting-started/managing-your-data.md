# Managing your data
Our main data container is called **index** (plural **indices**) and it can be considered as a database in the
 traditional **SQL** world. In an index, the data is grouped into **data types** called **mappings** in ES. A mapping
  descrives how the records are composed (fields).
  
Every record that stored in ES must be a **JSON** object.

Natively, ES is a schema-less data store; when you enter records in it during the **insert** process, it processes
 the records, splits it into fields, and updates the schema to manage the inserted data.
 
To manage huge volumes of records, ES uses the common approach to **split an index into multiple shards** so that
 they can be spread on several nodes.
 
Every record is stored in only a shard; the sharding algorithm is based on a record ID, so many operations that
 require loading and changing of records, can be achieved without hitting all the shards, but only the shard(and its
  replica) that contains your object.
  
## Structure comparison:
| ElasticSearch | SQL | MongoDB |
| --- | --- | --- |
| Index | Database | Database |
| Shard | Shard | Shard |
| Mapping/Type | Table | Collection |
| Field | Field | Field |
| JSON Object | Record | BSON Object |

## Operations in ES
**In ES, the operations are divided into:**
- **Cluster/Index operations**: 
    * All clusters/indices with active write are locked;
    * The read operations are broadcasted to all nodes.

**When a record is saved in ES, the **destination shard** is chosen based on:
- The ID of the record.
- If the `routing` or `parent` parameters are defined, the correct shard is chosen by the **hash** of these parameters.

- Index --- split into --> shards
- Shard ---- contain up to --- 2^32 records
    - ES performance scales horizontally with the number of shards.
    - All native records operations(index, search, update, and delete ..) are managed in shards.
    
## Best practices
- Not to have a shard too big in size (over 10 GB) to avoid poor **indexing performance**.
- Not to over-allocate the number of shards to avoid poor **search performance**.

<p dir="rtl">Next: <a href="./understanding-clusters-replication-and-sharding.md">Understanding clusters, replication
, and sharding</a></p>
