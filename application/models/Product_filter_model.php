<?php
class Product_filter_model extends CI_Model
{
	public function fetch_filter_type($type,$limit)
	{
		
		$this->db->select($type);
		$this->db->from('tbl_products');
		$this->db->distinct();
		$this->db->limit($limit);
		$query  = $this->db->get();
        $result = $query->result_array();
      	return !empty($result)?$result:false;
	}

	function make_query($minimum_price, $maximum_price, $brand, $type, $gender)
	{
		$query = "
		SELECT * FROM tbl_products  
		where status ='Active'
		";
		
		if(isset($minimum_price, $maximum_price) && !empty($minimum_price) && !empty($maximum_price))
		{
			$query .= "
			 AND WholesalePriceUSD BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
			";
		}

		if(isset($brand))
		{
			$brand_filter = implode("','", $brand);
			$query .= "
			 AND BrandName IN('".$brand_filter."')
			";
		}
		if(isset($type))
		{
			$type_filter = implode("','", $type);
			$query .= "
			 AND Type IN('".$type_filter."')
			";
		}
		if(isset($gender))
		{
			$gender_filter = implode("','", $gender);
			$query .= "
			 AND Gender IN('".$gender_filter."')
			";
		}
		return $query;
	}

	function fetch_data($limit, $start, $minimum_price, $maximum_price, $brand, $type, $gender)
	{
		$query = $this->make_query($minimum_price, $maximum_price, $brand, $type, $gender);

		$query .= ' LIMIT '.$start.', ' . $limit;

		$data = $this->db->query($query);

		$output = '';
		if($data->num_rows() > 0)
		{
			foreach($data->result_array() as $row)
			{
				$output .= '
					  <div class="col-lg-3 col-sm-6" >
                                
                        <div class="single-product-item">
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail">
                                <a href="'.base_url().'Products/'.$row['ItemId'].'/'.$row['ProductName'].'" class="d-block">
                                    <img class="primary-thumb" src="'.$row['SmallImageUrl'].'"
                                         alt="Product"/>
                                    <img class="secondary-thumb" src="'.$row['SmallImageUrl'].'"
                                         alt="Product"/>
                                </a>
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                <a href="#" class="product-cat-name">'.$row['Type'].'</a>
                                <h2 class="product-name"><a href="'.base_url().'Products/'.$row['ItemId'].'/'.$row['ProductName'].'" >'.$row['ProductName'].'</a></h2>
                                <div class="product-prices">
                                    
                                    <span class="price">$ '.number_format($row['WholesalePriceUSD'],2).'</span>
                                </div>

                                
                            </div>
                        </div>
                          
                    </div>

				';
			}
		}
		else
		{
			$output = '<h3>No Data Found</h3>';
		}
		return $output;
	}

	function count_all($minimum_price, $maximum_price, $brand, $type, $gender)
	{
		$query = $this->make_query($minimum_price, $maximum_price,$brand, $type, $gender);
		$data = $this->db->query($query);
		return $data->num_rows();
	}

}
?>