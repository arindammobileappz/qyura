<?php
if(!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}

class Medicart_model extends Common_model
{
    
    public function __construct()
    {
        parent::__construct();
	
    }
    
    
    public function getMedlists($option)
    {
        $lat        =   '';
        $long      =   '';
        $search    =   ''; 
        $notin       =   '';
        
        extract($option);
        $nowDt      =   time();
        
        $con = array(
                        'qyura_diagnostic.diagnostic_deleted'=>0,
                        'qyura_users.users_deleted'=>0,
                        'qyura_medicartOffer.medicartOffer_deleted'=>0,
                        'qyura_offerCat.offerCat_deleted'=>0,
                        'qyura_medicartOffer.medicartOffer_endDate >'=>$nowDt
                    );
        
        $this->db->select('qyura_medicartOffer.medicartOffer_id,'
                . 'qyura_medicartOffer.medicartOffer_MIId,qyura_medicartOffer.medicartOffer_offerCategory,'
                . 'qyura_medicartOffer.medicartOffer_title,CONCAT("assets/Medicart","/",qyura_medicartOffer.medicartOffer_image) as medicartOffer_image,'
                . 'qyura_medicartOffer.medicartOffer_description,qyura_medicartOffer.medicartOffer_allowBooking,'
                . 'qyura_medicartOffer.medicartOffer_maximumBooking,qyura_medicartOffer.medicartOffer_startDate,'
                . 'qyura_medicartOffer.medicartOffer_endDate,qyura_medicartOffer.medicartOffer_discount,'
                . 'qyura_medicartOffer.medicartOffer_ageDiscount,qyura_medicartOffer.medicartOffer_actualPrice,'
                . 'qyura_medicartOffer.medicartOffer_discountPrice,qyura_medicartOffer.medicartOffer_deleted,'
                . 'qyura_medicartOffer.modifyTime,qyura_hospital.hospital_name,qyura_diagnostic.diagnostic_name,
                   qyura_diagnostic.diagnostic_lat,qyura_diagnostic.diagnostic_long,qyura_hospital.hospital_lat,qyura_hospital.hospital_long,
                (6371 * acos( cos( radians( ' . $lat . ' ) ) * cos( radians( qyura_hospital.hospital_lat ) ) * cos( radians( qyura_hospital.hospital_long ) - radians( ' . $long . ' ) ) + sin( radians( ' . $lat . ' ) ) * sin( radians( qyura_hospital.hospital_lat ) ) )
                ) AS hosDistance,
                (6371 * acos( cos( radians( ' . $lat . ' ) ) * cos( radians( qyura_diagnostic.diagnostic_lat ) ) * cos( radians( qyura_diagnostic.diagnostic_long ) - radians( ' . $long . ' ) ) + sin( radians( ' . $lat . ' ) ) * sin( radians( qyura_diagnostic.diagnostic_lat ) ) )
                ) AS diagDistance')
        ->from('qyura_medicartOffer')
        ->join('qyura_offerCat','qyura_offerCat.offerCat_id=qyura_medicartOffer.medicartOffer_offerCategory','left')
        ->join('qyura_users','qyura_users.users_id=qyura_medicartOffer.medicartOffer_MIId','left')
        ->join('qyura_hospital','qyura_hospital.hospital_usersId=qyura_users.users_id','left')   
        ->join('qyura_diagnostic','qyura_diagnostic.diagnostic_usersId=qyura_users.users_id','left') 
        ->where($con)
        ->or_where(array('qyura_diagnostic.diagnostic_deleted'=>0,'qyura_hospital.hospital_deleted'=>0))
        ->where_not_in('qyura_medicartOffer.medicartOffer_id', $notIn)
        ->or_having(array('hosDistance <' => USER_DISTANCE,'diagDistance <'=> USER_DISTANCE))
        ->group_by('qyura_medicartOffer.medicartOffer_id')
        ->limit(DATA_LIMIT);
        return $this->db->get()->result();
    }
    
    public function getMedDetail($medicartOffer_id)
    {
        $nowDt = time();
        $con = array(
                        'qyura_diagnostic.diagnostic_deleted'=>0,
                        'qyura_users.users_deleted'=>0,
                        'qyura_medicartOffer.medicartOffer_deleted'=>0,
                        'qyura_offerCat.offerCat_deleted'=>0,
                        'qyura_medicartOffer.medicartOffer_endDate >'=>$nowDt,
                        'qyura_medicartOffer.medicartOffer_id' => $medicartOffer_id
                    );
        
        $this->db->select('qyura_medicartOffer.medicartOffer_id,'
                . 'qyura_medicartOffer.medicartOffer_MIId,qyura_medicartOffer.medicartOffer_offerCategory,'
                . 'qyura_medicartOffer.medicartOffer_title,CONCAT("assets/Medicart","/",qyura_medicartOffer.medicartOffer_image) as medicartOffer_image,'
                . 'qyura_medicartOffer.medicartOffer_description,qyura_medicartOffer.medicartOffer_allowBooking,'
                . 'qyura_medicartOffer.medicartOffer_maximumBooking,qyura_medicartOffer.medicartOffer_startDate,'
                . 'qyura_medicartOffer.medicartOffer_endDate,qyura_medicartOffer.medicartOffer_discount,'
                . 'qyura_medicartOffer.medicartOffer_ageDiscount,qyura_medicartOffer.medicartOffer_actualPrice,'
                . 'qyura_medicartOffer.medicartOffer_discountPrice,qyura_medicartOffer.medicartOffer_deleted,'
                . 'qyura_medicartOffer.modifyTime,qyura_hospital.hospital_name,qyura_diagnostic.diagnostic_name')
        ->from('qyura_medicartOffer')
        ->join('qyura_offerCat','qyura_offerCat.offerCat_id=qyura_medicartOffer.medicartOffer_offerCategory','left')
        ->join('qyura_users','qyura_users.users_id=qyura_medicartOffer.medicartOffer_MIId','left')
        ->join('qyura_hospital','qyura_hospital.hospital_usersId=qyura_users.users_id','left')   
        ->join('qyura_diagnostic','qyura_diagnostic.diagnostic_usersId=qyura_users.users_id','left') 
        ->where($con)
        ->or_where(array('qyura_diagnostic.diagnostic_deleted'=>0,'qyura_hospital.hospital_deleted'=>0))
        ->limit(1);
        return $this->db->get()->row();
    }
    
    public function add($table,$data)
    {
         $data = $this->_filter_data($table, $data);

         $this->db->insert($table, $data);

         $id = $this->db->insert_id();

         return $id;
    }
    
    /**
     * booking_check
     *
     * @return bool
     
     * */
    public function booking_check($where = '') {
        
        if (empty($where)) {
            return FALSE;
        }

        return $this->db->where($where)
                        ->order_by("medicartBooking_id", "ASC")
                        ->limit(1)
                        ->count_all_results('qyura_medicartBooking') > 0;
    }
    
    public function getSingleData($where='',$select='*')
    {
        if (empty($where)) {
            return FALSE;
        }

        return $this->db->select($select)->where($where)
                        ->order_by("medicartOffer_id", "ASC")
                        ->limit(1)
                        ->get('qyura_medicartOffer')->row();
    }
    
    
    

}
?>
