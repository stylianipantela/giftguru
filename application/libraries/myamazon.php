<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyAmazon {


	// implements amazon model ---> should be moved to models later
    // get 100 items later rather than just 10

    public function lookup($category, $keyword) {
        include("amazon_api_class.php");
        $amazon = new AmazonProductAPI();
        $parameters = array("Operation"     => "ItemSearch",
                            "SearchIndex"   => $category,
                            "Keywords"      => $keyword,
                            "ResponseGroup" => "Images,ItemAttributes,OfferSummary");

        $result = $amazon->queryAmazon($parameters);
        $json = json_encode($result);
        $array = json_decode($json, true);
        $mystr = "";

        foreach($array['Items']['Item'] as $item){
            if (isset($item['OfferSummary']['LowestNewPrice']['FormattedPrice']) && 
                isset($item['SmallImage']['URL']) &&
                isset($item['DetailPageURL']) && $item['ItemAttributes']['Title']) {
                $mystr .= "<img src=\"" . $item['MediumImage']['URL'] . "\"></br>";
                $mystr .= "<a href=\"". $item['DetailPageURL'] ."\">" . $item['ItemAttributes']['Title'] . "</a><br>";
                $mystr .= $item['OfferSummary']['LowestNewPrice']['FormattedPrice'] . "<br>";
            }
        }    
        return $mystr;
    }

}

/* End of file MyAmazon.php */
