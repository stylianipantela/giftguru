<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyAmazon {

	// implements amazon model ---> should be moved to models later
    // TODO: get 100 items later rather than just 10

    public function lookup_page($category, $keyword, $page) {
        require_once("amazon_api_class.php");
        $amazon = new AmazonProductAPI();
        $parameters = array("Operation"     => "ItemSearch",
                            "SearchIndex"   => $category,
                            "Keywords"      => $keyword,
                            "ItemPage"      => $page,
                            "ResponseGroup" => "Images,ItemAttributes,OfferSummary");

        $result = $amazon->queryAmazon($parameters);
        $json = json_encode($result);
        $array = json_decode($json, true);
        $result = array ();
        foreach($array['Items']['Item'] as $item){
            if (isset($item['OfferSummary']['LowestNewPrice']['FormattedPrice']) && 
                isset($item['MediumImage']['URL']) &&
                isset($item['DetailPageURL']) && $item['ItemAttributes']['Title']) {
                $result[] = array(  'imgUrl'  => $item['MediumImage']['URL'], 
                                    'pageUrl' => $item['DetailPageURL'], 
                                    'title'   => $item['ItemAttributes']['Title'],
                                    'price'   => $item['OfferSummary']['LowestNewPrice']['FormattedPrice']);
            }
        }    
        return $result;
    }

    public function lookupImgUrl($keyword) {
        require_once("amazon_api_class.php");
        $amazon = new AmazonProductAPI();
        $parameters = array("Operation"     => "ItemSearch",
                            "SearchIndex"   => "All",
                            "Keywords"      => $keyword,
                            "ItemPage"      => 1,
                            "ResponseGroup" => "Small,Images");

        $result = $amazon->queryAmazon($parameters);
        $json = json_encode($result);
        $array = json_decode($json, true);
        foreach($array['Items']['Item'] as $item){
            if (isset($item['LargeImage']['URL']) && isset($item['DetailPageURL'])) {
                return array(   'imgUrl'  => $item['LargeImage']['URL'], 
                                'pageUrl' => $item['DetailPageURL']);

            }
        }    
        return array();
    }



    public function lookup($category, $keyword) {
        $result = array ();
        $result = array_merge($result, $this->lookup_page($category, $keyword, 1));
        return $result;
    }
}

/* End of file MyAmazon.php */
