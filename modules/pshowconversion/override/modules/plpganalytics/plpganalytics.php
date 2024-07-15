<?php

class PlPgAnalyticsOverride extends PlPgAnalytics
{

    public function hookOrderConfirmation($params)
    {
        // prevent sending transactions to google analytics
    }

}
