<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v8/resources/media_file.proto

namespace Google\Ads\GoogleAds\V8\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Encapsulates a Video.
 *
 * Generated from protobuf message <code>google.ads.googleads.v8.resources.MediaVideo</code>
 */
class MediaVideo extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The duration of the Video in milliseconds.
     *
     * Generated from protobuf field <code>int64 ad_duration_millis = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $ad_duration_millis = null;
    /**
     * Immutable. The YouTube video ID (as seen in YouTube URLs). Adding prefix
     * "https://www.youtube.com/watch?v=" to this ID will get the YouTube
     * streaming URL for this video.
     *
     * Generated from protobuf field <code>string youtube_video_id = 6 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $youtube_video_id = null;
    /**
     * Output only. The Advertising Digital Identification code for this video, as defined by
     * the American Association of Advertising Agencies, used mainly for
     * television commercials.
     *
     * Generated from protobuf field <code>string advertising_id_code = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $advertising_id_code = null;
    /**
     * Output only. The Industry Standard Commercial Identifier code for this video, used
     * mainly for television commercials.
     *
     * Generated from protobuf field <code>string isci_code = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $isci_code = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $ad_duration_millis
     *           Output only. The duration of the Video in milliseconds.
     *     @type string $youtube_video_id
     *           Immutable. The YouTube video ID (as seen in YouTube URLs). Adding prefix
     *           "https://www.youtube.com/watch?v=" to this ID will get the YouTube
     *           streaming URL for this video.
     *     @type string $advertising_id_code
     *           Output only. The Advertising Digital Identification code for this video, as defined by
     *           the American Association of Advertising Agencies, used mainly for
     *           television commercials.
     *     @type string $isci_code
     *           Output only. The Industry Standard Commercial Identifier code for this video, used
     *           mainly for television commercials.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V8\Resources\MediaFile::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The duration of the Video in milliseconds.
     *
     * Generated from protobuf field <code>int64 ad_duration_millis = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getAdDurationMillis()
    {
        return isset($this->ad_duration_millis) ? $this->ad_duration_millis : 0;
    }

    public function hasAdDurationMillis()
    {
        return isset($this->ad_duration_millis);
    }

    public function clearAdDurationMillis()
    {
        unset($this->ad_duration_millis);
    }

    /**
     * Output only. The duration of the Video in milliseconds.
     *
     * Generated from protobuf field <code>int64 ad_duration_millis = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setAdDurationMillis($var)
    {
        GPBUtil::checkInt64($var);
        $this->ad_duration_millis = $var;

        return $this;
    }

    /**
     * Immutable. The YouTube video ID (as seen in YouTube URLs). Adding prefix
     * "https://www.youtube.com/watch?v=" to this ID will get the YouTube
     * streaming URL for this video.
     *
     * Generated from protobuf field <code>string youtube_video_id = 6 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getYoutubeVideoId()
    {
        return isset($this->youtube_video_id) ? $this->youtube_video_id : '';
    }

    public function hasYoutubeVideoId()
    {
        return isset($this->youtube_video_id);
    }

    public function clearYoutubeVideoId()
    {
        unset($this->youtube_video_id);
    }

    /**
     * Immutable. The YouTube video ID (as seen in YouTube URLs). Adding prefix
     * "https://www.youtube.com/watch?v=" to this ID will get the YouTube
     * streaming URL for this video.
     *
     * Generated from protobuf field <code>string youtube_video_id = 6 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setYoutubeVideoId($var)
    {
        GPBUtil::checkString($var, True);
        $this->youtube_video_id = $var;

        return $this;
    }

    /**
     * Output only. The Advertising Digital Identification code for this video, as defined by
     * the American Association of Advertising Agencies, used mainly for
     * television commercials.
     *
     * Generated from protobuf field <code>string advertising_id_code = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getAdvertisingIdCode()
    {
        return isset($this->advertising_id_code) ? $this->advertising_id_code : '';
    }

    public function hasAdvertisingIdCode()
    {
        return isset($this->advertising_id_code);
    }

    public function clearAdvertisingIdCode()
    {
        unset($this->advertising_id_code);
    }

    /**
     * Output only. The Advertising Digital Identification code for this video, as defined by
     * the American Association of Advertising Agencies, used mainly for
     * television commercials.
     *
     * Generated from protobuf field <code>string advertising_id_code = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setAdvertisingIdCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->advertising_id_code = $var;

        return $this;
    }

    /**
     * Output only. The Industry Standard Commercial Identifier code for this video, used
     * mainly for television commercials.
     *
     * Generated from protobuf field <code>string isci_code = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getIsciCode()
    {
        return isset($this->isci_code) ? $this->isci_code : '';
    }

    public function hasIsciCode()
    {
        return isset($this->isci_code);
    }

    public function clearIsciCode()
    {
        unset($this->isci_code);
    }

    /**
     * Output only. The Industry Standard Commercial Identifier code for this video, used
     * mainly for television commercials.
     *
     * Generated from protobuf field <code>string isci_code = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setIsciCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->isci_code = $var;

        return $this;
    }

}

