<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyAmazon {

	// implements amazon model ---> should be moved to models later
    // TODO: get 100 items later rather than just 10

    public function lookup_page($category, $keyword, $page) {
        include("amazon_api_class.php");
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
                isset($item['SmallImage']['URL']) &&
                isset($item['DetailPageURL']) && $item['ItemAttributes']['Title']) {
                // $mystr .= "<img src=\"" . $item['MediumImage']['URL'] . "\"></br>";
                // $mystr .= "<a href=\"". $item['DetailPageURL'] ."\">" . $item['ItemAttributes']['Title'] . "</a><br>";
                // $mystr .= $item['OfferSummary']['LowestNewPrice']['FormattedPrice'] . "<br>";
                $result[] = array(  'imgUrl'  => $item['MediumImage']['URL'], 
                                    'pageUrl' => $item['DetailPageURL'], 
                                    'title'   => $item['ItemAttributes']['Title'],
                                    'price'   => $item['OfferSummary']['LowestNewPrice']['FormattedPrice']);
            }
        }    
        return $result;
    }


    public function lookup($category, $keyword) {
        $result = array ();
        for ($i = 1; $i <= 1; $i++) {
            $result = array_merge($result, $this->lookup_page($category, $keyword, $i));
        }
        return $result;
    }

}

/* End of file MyAmazon.php */
