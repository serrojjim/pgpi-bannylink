<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v8/enums/call_type.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V8\Enums;

class CallType
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
-google/ads/googleads/v8/enums/call_type.protogoogle.ads.googleads.v8.enums"i
CallTypeEnum"Y
CallType
UNSPECIFIED 
UNKNOWN
MANUALLY_DIALED
HIGH_END_MOBILE_SEARCHB�
!com.google.ads.googleads.v8.enumsBCallTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v8/enums;enums�GAA�Google.Ads.GoogleAds.V8.Enums�Google\\Ads\\GoogleAds\\V8\\Enums�!Google::Ads::GoogleAds::V8::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

