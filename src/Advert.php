<?php

declare(strict_types=1);

namespace MadalinIgnisca\Olx;

/**
 * {
  "title": "[qatest-mercury] Anunț de testare",
  "description": "Acesta este un anunț de testare, vă rugăm să îl ignorați.<br/><br/> Mulțumesc pentru înțelegere.",
  "category_urn": "urn:concept:houses-for-sale",
  "contact": {
    "name": "Daniel Stoica",
    "phone": "663774007",
    "email": "daniel.stoica@testmail.com",
    "photo": "https://i.imgur.com/9Em2tky.png(12 kB)"
  },
  "price": {
    "value": 450000,
    "currency": "RON"
  },
  "location": {
    "lat": 46.222288,
    "lon": 24.788900,
    "exact": false
  },
  "images": [
    {
      "url": "https://i.imgur.com/WozSfdQg.jpg(45 kB)"
    },
    {
      "url": "https://i.imgur.com/3YNg1bI.jpg(81 kB)"
    }
  ],
  "attributes": [
  	{
      "urn": "urn:concept:price-negotiable",
      "value": "urn:concept:no"
    },
    {
      "urn": "urn:concept:accepts-exchange",
      "value": "urn:concept:yes"
    },
  	{
      "urn": "urn:concept:building-type",
      "value": "urn:concept:multi-family"
    },
    {
      "urn": "urn:concept:floor",
      "value": "urn:concept:attic"
    },
    {
      "urn": "urn:concept:net-area-m2",
      "value": "110"
    },
    {
      "urn": "urn:concept:gross-area-m2",
      "value": "210"
    },
        {
      "urn": "urn:concept:terrain-area-m2",
      "value": "310"
    },
                                        {
      "urn": "urn:concept:plot-area",
      "value": "256"
    },
    {
      "urn": "urn:concept:building-ownership",
      "value": "urn:concept:cooperative-ownership-with-land-and-mortage-register"
    },
    {
      "urn": "urn:concept:status",
      "value": "urn:concept:ready-to-use"
    },
    {
      "urn": "urn:concept:number-of-rooms",
      "value": "urn:concept:7"
    },
    {
      "urn": "urn:concept:security",
      "value": "urn:concept:alarm"
    },
            {
      "urn": "urn:concept:security",
      "value": "urn:concept:video-surveillanc"
    },
                {
      "urn": "urn:concept:security",
      "value": "urn:concept:fence"
    },
    {
      "urn": "urn:concept:solar-orientation",
      "value": "urn:concept:north"
    },
    {
      "urn": "urn:concept:heating",
      "value": "urn:concept:gas"
    },
    {
      "urn": "urn:concept:windows-type",
      "value": "urn:concept:aluminium"
    },
    {
      "urn": "urn:concept:media-types",
      "value": "urn:concept:internet"
    },
    {
      "urn": "urn:concept:equipment-types",
      "value": "urn:concept:furniture"
    },
    {
      "urn": "urn:concept:construction-year",
      "value": "1900"
    },
        {
      "urn": "urn:concept:number-of-bathrooms",
      "value": "urn:concept:4-or-more"
    },
    {
      "urn": "urn:concept:state",
      "value": "urn:concept:ruin"
    },
    {
      "urn": "urn:concept:foreclosure",
      "value": "urn:concept:yes"
    },
            {
      "urn": "urn:concept:location",
      "value": "urn:concept:near-school"
    },
                {
      "urn": "urn:concept:location",
      "value": "urn:concept:near-transport"
    },
                {
      "urn": "urn:concept:location",
      "value": "urn:concept:near-pharmacy"
    },
                {
      "urn": "urn:concept:amenities",
      "value": "urn:concept:external-garage"
    },
                {
      "urn": "urn:concept:amenities",
      "value": "urn:concept:furnished"
    },
                    {
      "urn": "urn:concept:amenities",
      "value": "urn:concept:central-heating"
    },
                        {
      "urn": "urn:concept:facilities",
      "value": "urn:concept:sewer-system"
    },
                            {
      "urn": "urn:concept:facilities",
      "value": "urn:concept:playground"
    },
                            {
      "urn": "urn:concept:house-type",
      "value": "urn:concept:semidetached"
    },
                                {
      "urn": "urn:concept:promotional-price",
      "value": "urn:concept:no"
    },
                                {
      "urn": "urn:concept:price-on-request",
      "value": "urn:concept:yes"
    },
                                    {
      "urn": "urn:concept:spaces",
      "value": "urn:concept:balcony"
    },
                                       {
      "urn": "urn:concept:with-purchase-option",
      "value": "urn:concept:yes"
    },
    {
      "urn": "urn:concept:extras",
      "value": "urn:concept:lift"
    }
  ],
  "site_urn": "urn:site:storiaro",
  "custom_fields": {
    "id": "13",
    "reference_id": "TEST123698"
  }
}
 */

class Advert
{
    public $title;
}
