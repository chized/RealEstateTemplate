<?php

class Property{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getproperties(){
        $this->db->query('SELECT p.*, p.propertyId as propertyId, i.imageUrl as imageUrl 
                        FROM properties p LEFT OUTER JOIN images i 
                        ON p.propertyId = i.propertyId 
                        WHERE p.isActive = 1  GROUP BY p.propertyId');

        $results = $this->db->resultSet();

        return $results;
    }
    public function findPropertyImageRank($data){
        $this->db->query('SELECT * FROM images WHERE propertyId = :propertyId AND imageRank = :imageRank');
        $this->db->bind(':propertyId', $data['propertyId']);
        $this->db->bind(':imageRank', $data['imageRank']);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function activateProperty($data){
        $this->db->query('UPDATE properties SET isActive = :isActive WHERE propertyId = :propertyId');

        //Bind query
        $this->db->bind(':isActive', $data['isActive']);
        $this->db->bind(':propertyId', $data['propertyId']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updatePropertyRent($data){
        $this->db->query('UPDATE properties SET propertyCategory = :propertyCategory, propertyName = :propertyName, propertyDesc = :propertyDesc, propertyTown = :propertyTown, locationDesc = :locationDesc, propertySize = :propertySize, propertyType = :propertyType, propertyPrice = :propertyPrice, amenities = :amenities, bedrooms = :bedrooms, toilets = :toilets WHERE propertyId = :propertyId');

        //Bind query
        
        $this->db->bind(':propertyId', $data['propertyId']);
        $this->db->bind(':propertyCategory', $data['propertyCategory']);
        $this->db->bind(':propertyName', $data['propertyName']);
        $this->db->bind(':propertyDesc', $data['propertyDesc']);
        $this->db->bind(':propertyTown', $data['propertyTown']);
        $this->db->bind(':locationDesc', $data['locationDesc']);
        $this->db->bind(':propertySize', $data['propertySize']);
        $this->db->bind(':propertyType', $data['propertyType']);
        $this->db->bind(':propertyPrice', $data['propertyPrice']);
        $this->db->bind(':amenities', $data['amenities']);
        $this->db->bind(':bedrooms', $data['bedrooms']);
        $this->db->bind(':toilets', $data['toilets']);
        

        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deactivateProperty($data){
        $this->db->query('UPDATE properties SET isActive = :isActive WHERE propertyId = :propertyId');

        //Bind query
        $this->db->bind(':isActive', $data['isActive']);
        $this->db->bind(':propertyId', $data['propertyId']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function adminGetPropertyPages(){
    $this->db->query('SELECT count(propertyId) as id FROM properties');

    $results = $this->db->results();

        return $results;
    }
    public function adminGetproperties($pageStart, $pageLimit){
        $this->db->query('SELECT * FROM properties 
                        LIMIT :pageStart, :pageLimit');
        $this->db->bind(':pageLimit', $pageLimit);
        $this->db->bind(':pageStart', $pageStart);
        $results = $this->db->resultSet();

        return $results;
    }

    public function getFilterCat(){
        $this->db->query('SELECT * FROM filters
                WHERE filterParent = "categories" ');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getFilterType(){
        $this->db->query('SELECT * FROM filters 
                WHERE filterParent = "propertyType" ');
        $results = $this->db->resultSet();

        return $results;
    }

    public function adminTypeFilter($pageStart, $pageLimit, $search_text){
        //$search_text = $data['search_text'];
        $query = "
          SELECT * FROM properties 
          WHERE propertyType = ".$search_text." 
          LIMIT :pageStart, :pageLimit";
        $this->db->query($query);
        $this->db->bind(':pageLimit', $pageLimit);
        $this->db->bind(':pageStart', $pageStart);
        //$this->db->bind(':types', $data['types']);

        $results = $this->db->resultSet();

        return $results;
    }

    public function adminPropertySearch($pageStart, $pageLimit, $data){
        $searchText = trim($data['searchText']);
        $query ="SELECT * FROM `properties` WHERE `propertyName` LIKE :searchText; OR `propertyTown` LIKE : searchText; OR `propertyDesc` LIKE :searchText; LIMIT :pageStart, :pageLimit";
        $this->db->query($query);
        // $this->db->bind(':types', $data['types']);
         $this->db->bind(':searchText', '%' .$searchText. '%'); //PDO::PARAM_STR);
        $this->db->bind(':pageLimit', $pageLimit);
        $this->db->bind(':pageStart', $pageStart);
        $results = $this->db->resultSet();
        
        return $results;
    }

    public function getpropertiesByUserId($userId){
        $this->db->query('SELECT *, p.propertyId as propertyId,
                        u.userId as userId 
                        FROM properties p INNER JOIN users u 
                        ON p.propertyOwnerId = u.userId
                        ORDER BY p.propertyStatusId');

        $results = $this->db->resultSet();

        return $results;
    }

    
    public function getPropertyById($propertyId){
        $this->db->query('SELECT * FROM properties WHERE propertyId = :propertyId');
        $this->db->bind(':propertyId', $propertyId);

        $row = $this->db->single();
        return $row;
    }

    public function getImageByPropertyId($propertyId){
        $this->db->query('SELECT imageId, imageName, imageUrl, propertyId, imageRank FROM images WHERE propertyId = :propertyId');

        $this->db->bind(':propertyId', $propertyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getPropertyMainImage($propertyId){
        $this->db->query('SELECT * FROM images WHERE propertyId = :propertyId AND imageRank = 1');
        $this->db->bind(':propertyId', $propertyId);

        $row = $this->db->single();
        return $row;
    }

    public function imageUpload($data){
        $this->db->query('INSERT INTO images (imageName, imageUrl, imageRank, imageDesc, propertyId) VALUES ( :imageName, :imageUrl, :imageRank, :imageDesc, :propertyId)');
        
                //Bind query
                $this->db->bind(':imageName', $data['imageName']);
                $this->db->bind(':imageUrl', $data['imageUrl']);
                $this->db->bind(':imageRank', $data['imageRank']);
                $this->db->bind(':imageDesc', $data['imageDesc']);
                $this->db->bind(':propertyId', $data['propertyId']);
                //Execute query
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
    }

    public function addPropertyRent($data){
        $this->db->query('INSERT INTO properties (propertyCategory, propertyName, propertyDesc, propertyCode, propertyTown, locationDesc, propertySize, propertyType, propertyPrice, propertyOwnerId, amenities, bedrooms, toilets) VALUES ( :propertyCategory, :propertyName, :propertyDesc, :propertyCode, :propertyTown, :locationDesc, :propertySize, :propertyType, :propertyPrice, :propertyOwnerId, :amenities, :bedrooms, :toilets)');

        //Bind query
        $this->db->bind(':propertyCategory', $data['propertyCategory']);
        $this->db->bind(':propertyName', $data['propertyName']);
        $this->db->bind(':propertyDesc', $data['propertyDesc']);
        $this->db->bind(':propertyCode', $data['propertyCode']);
        $this->db->bind(':propertyTown', $data['propertyTown']);
        $this->db->bind(':locationDesc', $data['locationDesc']);
        $this->db->bind(':propertySize', $data['propertySize']);
        $this->db->bind(':propertyType', $data['propertyType']);
        $this->db->bind(':propertyPrice', $data['propertyPrice']);
        $this->db->bind(':propertyOwnerId', $data['propertyOwnerId']);
        $this->db->bind(':amenities', $data['amenities']);
        $this->db->bind(':bedrooms', $data['bedrooms']);
        $this->db->bind(':toilets', $data['toilets']);

        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function uploadFiles() {
                
        // if(isset($_FILES['profile_img'])){

        //     $image = new Image();

        //     $filename = $_FILES["profile_img"]["name"];
        //     $realname = "uploads/" . basename($filename);
        //     $directory = "/Applications/MAMP/htdocs/eliphp1/uploads/";

        //     $path = $directory . basename($filename);

        //     $image_name = $_POST['image_name'];


        //     if($image->upload_image($realname, $image_name)){

        //         move_uploaded_file($_FILES["profile_img"]["tmp_name"], $path);

        //         echo '<img src="'.$image->get_image().'">';


        //     };


        // };
    }

    public function addProperty($data){
        //$data[]getTokenRent();
        $this->db->query('INSERT INTO properties (propertyName, propertyDesc, propertyOwnerId) VALUES ( :propertyName, :propertyDesc, :propertyOwnerId)');

        //Bind query
        $this->db->bind(':propertyName', $data['propertyName']);
        $this->db->bind(':propertyDesc', $data['propertyDesc']);
        $this->db->bind(':propertyOwnerId', $data['propertyOwnerId']);

        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    function getTokenRent($length){
        $token = "";
        $codeAlphabet = "RENT";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
        $lenght = 10;
   
       for ($i=0; $i < $length; $i++) {
           $token .= $codeAlphabet[random_int(0, $max-1)];
       }
   
       return $token;
   }

    public function updateProperty($data){
        $this->db->query('UPDATE properties SET propertyCategory = :propertyCategory, propertyName = :propertyName, propertyDesc = :propertyDesc, propertyTown = :propertyTown, locationDesc = :locationDesc, propertySize = :propertySize, propertyType = :propertyType, propertyPrice = :propertyPrice, amenities = :amenities, bedrooms = :bedrooms, toilets = :toilets WHERE propertyId = :propertyId');

        //Bind query
        $this->db->bind(':propertyId', $data['propertyId']);
        $this->db->bind(':propertyCategory', $data['propertyCategory']);
        $this->db->bind(':propertyName', $data['propertyName']);
        $this->db->bind(':propertyDesc', $data['propertyDesc']);
        $this->db->bind(':propertyCode', $data['propertyCode']);
        $this->db->bind(':propertyTown', $data['propertyTown']);
        $this->db->bind(':locationDesc', $data['locationDesc']);
        $this->db->bind(':propertySize', $data['propertySize']);
        $this->db->bind(':propertyType', $data['propertyType']);
        $this->db->bind(':propertyPrice', $data['propertyPrice']);
        $this->db->bind(':amenities', $data['amenities']);
        $this->db->bind(':bedrooms', $data['bedrooms']);
        $this->db->bind(':toilets', $data['toilets']);

        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteProperty($propertyId){
        $this->db->query('DELETE FROM properties WHERE propertyId = :propertyId');

        //Bind query
        
        $this->db->bind(':propertyId', $propertyId);
      
        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addCartItem($data){
        $this->db->query('INSERT INTO cartitems ( propertyId, userId, transactionId, authUrl, accessCode, reference) VALUES ( :propertyId, :userId, :transactionId, :authUrl, :accessCode, :reference)');
        
                //Bind query
                $this->db->bind(':propertyId', $data['prop_id']);
                $this->db->bind(':userId', $data['user_id']);
                $this->db->bind(':transactionId', $data['trans_id']);
                $this->db->bind(':authUrl', $data['auth_url']);
                $this->db->bind(':accessCode', $data['access_code']);
                $this->db->bind(':reference', $data['reference']);
                //Execute query
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
    } 

    public function getPropertyReviews($data){
        $this->db->query('SELECT rev.*, us.firstName, us.surname FROM reviews rev, users us WHERE rev.propertyId = :propertyId AND rev.userId = us.userId ORDER BY rev.id DESC LIMIT 10');
        $this->db->bind(':propertyId', $data['propertyId']);
        $results = $this->db->resultSet();

        return $results;
    }

    public function getUserPropertyReview($data){
        $this->db->query('SELECT * FROM reviews WHERE propertyId = :propertyId AND userId = :userId LIMIT 1');
        $this->db->bind(':propertyId', $data['propertyId']);
        $this->db->bind(':userId', $data['userId']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function addPropertyReview($data){
        $this->db->query('INSERT INTO reviews (userId, propertyId, rating, msg) VALUES ( :userId, :propertyId, :rating, :msg)');

        //Bind query
        $this->db->bind(':userId', $data['userId']);
        $this->db->bind(':propertyId', $data['propertyId']);
        $this->db->bind(':rating', $data['rating']);
        $this->db->bind(':msg', $data['msg']);
        

        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
