<?php

namespace DDD\Infrastructure\Kafka\Constants;

class KafkaConstant
{
    /**
     * - "UA" stands for "Unassigned."
     * - When used in the context of producing a Kafka message, this constant is used to specify that the partition to which the message should be sent should be automatically determined by Kafka.
     * - In other words, Kafka will select a partition based on its own algorithms, often using message keys or a round-robin mechanism.
     */
    public const RD_KAFKA_PARTITION_UA = RD_KAFKA_PARTITION_UA;

    /**
     * - This constant represents a Kafka response code indicating that there was no error.
     * - In Kafka, when producing or consuming messages, a response code is used to indicate the result of the operation.
     * - RD_KAFKA_RESP_ERR_NO_ERROR means that the operation was successful, and there were no errors.
     */
    public const RD_KAFKA_RESP_ERR_NO_ERROR = RD_KAFKA_RESP_ERR_NO_ERROR;

    /**
     * - This constant represents a Kafka response code indicating that there are no more messages available in a particular partition of a topic.
     * - When consuming messages from a Kafka topic partition, reaching the end of the partition is a normal condition, and this constant is used to indicate that no more messages are available for consumption in that partition.
     */
    public const RD_KAFKA_RESP_ERR__PARTITION_EOF = RD_KAFKA_RESP_ERR__PARTITION_EOF;

    /**
     * - This constant represents a Kafka response code indicating that an operation (such as consuming a message or waiting for a message) has timed out.
     * - In Kafka, it's common to specify timeouts for various operations to avoid waiting indefinitely.
     * - When a timeout occurs, this constant is used to indicate that the operation couldn't be completed within the specified time frame.
     */
    public const RD_KAFKA_RESP_ERR__TIMED_OUT = RD_KAFKA_RESP_ERR__TIMED_OUT;
}
