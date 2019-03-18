<?php

namespace App\Helpers;

class EpisodeStatus
{
    public const PLANNED = [ 'value' => 'Planned', 'key' => 'PLANNED'];
    public const RECORDED = [ 'value' => 'Recorded', 'key' => 'RECORDED'];
    public const UPLOADED_SERVER = [ 'value' => 'Uploaded to server', 'key' => 'UPLOADED_SERVER'];
    public const MIXED = [ 'value' => 'Mixed', 'key' => 'MIXED'];
    public const MASTERED = [ 'value' => 'Mastered', 'key' => 'MASTERED'];
    public const UPLOADED_MIXCLOUD = [ 'value' => 'Uploaded to Mixcloud', 'key' => 'UPLOADED_MIXCLOUD'];
    public const PUBLISH_SCHEDULED = [ 'value' => 'Scheduled to publish', 'key' => 'PUBLISH_SCHEDULED'];
    public const PUBLISHED = [ 'value' => 'Published', 'key' => 'PUBLISHED'];

    public const ALL = [
        self::PLANNED,
        self::RECORDED,
        self::UPLOADED_SERVER,
        self::MIXED,
        self::MASTERED,
        self::UPLOADED_MIXCLOUD,
        self::PUBLISH_SCHEDULED,
        self::PUBLISHED,
    ];

    public static function find($key)
    {
        foreach(self::ALL as $item)
        {
            if ($key === $item['key'])
            {
                return $item['value'];
            }
        }

        throw new \Exception("$key not found.");
    }
}
