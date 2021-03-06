<?php

class Medicart_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function fetchStates() {
        $this->db->select('state_id,state_statename');
        $this->db->from('qyura_state');
        $this->db->order_by("state_statename", "asc");
        return $this->db->get()->result();
    }

    function fetchCity($stateId = NULL) {

        $this->db->select('city_id,city_name');
        $this->db->from('qyura_city');
        $this->db->where('city_stateid', $stateId);
        $this->db->order_by("city_name", "asc");
        return $this->db->get()->result();
    }

    function fetchEmail($email) {
        $this->db->select('users_email');
        $this->db->from('qyura_users');
        $this->db->where('users_email', $email);
        $result = $this->db->get();
        // return $this->db->last_query();
        if ($result->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    function insertAmbulanceUser($insertData) {
        $this->db->insert('qyura_users', $insertData);
        $insert_id = $this->db->insert_id();
        // echo $this->db->last_query();exit;
        return $insert_id;
    }

    function insertUsersRoles($insertData) {
        $this->db->insert('qyura_usersRoles', $insertData);
        $insert_id = $this->db->insert_id();
        return true;
    }

    function UpdateTableData($data = array(), $where = array(), $tableName = NULL) {
        foreach ($where as $key => $val) {
            $this->db->where($key, $val);
        }

        $this->db->update($tableName, $data);

        //echo $this->db->last_query();exit;
        return TRUE;
    }
    
  function fetchHospital ($cityId=NULL){

        $this->db->select('hospital_id,hospital_usersId,hospital_name');
        $this->db->from('qyura_hospital');
        $this->db->where('hospital_cityId',$cityId);
        $this->db->order_by("hospital_name","asc");
        return $this->db->get()->result();
    }
    
  function fetchDiagnostic ($cityId=NULL){

        $this->db->select('diagnostic_id, diagnostic_usersId, diagnostic_name');
        $this->db->from('qyura_diagnostic');
        $this->db->where('diagnostic_cityId',$cityId);
        $this->db->order_by("diagnostic_name","asc");
        return $this->db->get()->result();
    }

    //Function for update
    public function customUpdate($options) {
        $table = false;
        $where = false;
        $orwhere = false;
        $data = false;

        extract($options);

        if (!empty($where)) {
            $this->db->where($where);
        }

        // using or condition in where  
        if (!empty($orwhere)) {
            $this->db->or_where($orwhere);
        }
        $this->db->update($table, $data);

        return $this->db->affected_rows();
    }

    //Function for insert
    public function customInsert($options) {
        $table = false;
        $data = false;

        extract($options);

        $this->db->insert($table, $data);

        return $this->db->insert_id();
    }

    //Function for delete
    public function customDelete($options) {
        $table = false;
        $where = false;

        extract($options);

        if (!empty($where))
            $this->db->where($where);

        $this->db->delete($table);

        return $this->db->affected_rows();
    }

    //Function for get
    public function customGet($options) {

        $select = false;
        $table = false;
        $join = false;
        $order = false;
        $limit = false;
        $offset = false;
        $where = false;
        $or_where = false;
        $single = false;
        $where_not_in = false;
        $group_by = false;

        extract($options);

        if ($select != false)
            $this->db->select($select);

        if ($table != false)
            $this->db->from($table);

        if ($where != false)
            $this->db->where($where);

        if ($where_not_in != false) {
            foreach ($where_not_in as $key => $value) {
                if (count($value) > 0)
                    $this->db->where_not_in($key, $value);
            }
        }

        if ($or_where != false)
            $this->db->or_where($or_where);

        if ($limit != false) {

            if (!is_array($limit)) {
                $this->db->limit($limit);
            } else {
                foreach ($limit as $limitval => $offset) {
                    $this->db->limit($limitval, $offset);
                }
            }
        }


        if ($order != false) {

            foreach ($order as $key => $value) {

                if (is_array($value)) {
                    foreach ($order as $orderby => $orderval) {
                        $this->db->order_by($orderby, $orderval);
                    }
                } else {
                    $this->db->order_by($key, $value);
                }
            }
        }


        if ($join != false) {

            foreach ($join as $key => $value) {

                if (is_array($value)) {

                    if (count($value) == 3) {
                        $this->db->join($value[0], $value[1], $value[2]);
                    } else {
                        foreach ($value as $key1 => $value1) {
                            $this->db->join($key1, $value1);
                        }
                    }
                } else {
                    $this->db->join($key, $value);
                }
            }
        }
        if ($group_by != false) {
            $this->db->group_by($group_by);
        }


        $query = $this->db->get();

        if ($single) {
            return $query->row();
        }


        return $query->result();
    }

 public function getMedDetail($medicartOffer_id)
    {
        $nowDt = time();
        $con = array(
                        'qyura_users.users_deleted'=>0,
                        'qyura_medicartOffer.medicartOffer_deleted'=>0,
                        'qyura_medicartOffer.medicartOffer_id' => $medicartOffer_id
                    );
        
        $this->db->select('qyura_medicartOffer.medicartOffer_id,qyura_medicartOffer.medicartOffer_cityId,qyura_medicartOffer.medicartOffer_OfferId,qyura_medicartOffer.medicartOffer_image,'
                . 'qyura_medicartOffer.medicartOffer_MIId,qyura_medicartOffer.medicartOffer_offerCategory,'
                . 'qyura_medicartOffer.medicartOffer_title,CONCAT("assets/Medicart/thumb/original","/",qyura_medicartOffer.medicartOffer_image) as medicartOffer_image,'
                . 'qyura_medicartOffer.medicartOffer_description,qyura_medicartOffer.medicartOffer_allowBooking,'
                . 'qyura_medicartOffer.medicartOffer_maximumBooking,qyura_medicartOffer.medicartOffer_startDate,'
                . 'qyura_medicartOffer.medicartOffer_endDate,qyura_medicartOffer.medicartOffer_discount,'
                . 'qyura_medicartOffer.medicartOffer_ageDiscount,qyura_medicartOffer.medicartOffer_actualPrice,'
                . 'qyura_medicartOffer.medicartOffer_discountPrice,qyura_medicartOffer.medicartOffer_deleted,'
                . 'qyura_medicartOffer.modifyTime,(CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_name WHEN(hospital_usersId is not null) THEN hospital_name END) as MIname,(CASE WHEN(diagnostic_usersId is not null) THEN 1 WHEN(hospital_usersId is not null) THEN 2 END) as miType,(CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_usersId WHEN(hospital_usersId is not null) THEN hospital_usersId END) as miId')
        ->from('qyura_medicartOffer')
        ->join('qyura_users','qyura_users.users_id=qyura_medicartOffer.medicartOffer_MIId','left')
        ->join('qyura_hospital','qyura_hospital.hospital_usersId=qyura_users.users_id','left')   
        ->join('qyura_diagnostic','qyura_diagnostic.diagnostic_usersId=qyura_users.users_id','left') 
        ->where($con)
        ->limit(1);
        return $this->db->get()->row();
    }
    
    function fetchMedicartDataTables($condition = NULL) {

        $imgUrl = base_url() . 'assets/Medicart/$1';

        $this->datatables->select('qyura_medicartOffer.medicartOffer_id,'
                . 'qyura_medicartOffer.medicartOffer_MIId,qyura_medicartOffer.medicartOffer_offerCategory,'
                . 'qyura_medicartOffer.medicartOffer_description,qyura_medicartOffer.medicartOffer_allowBooking,'
                . 'qyura_medicartOffer.medicartOffer_maximumBooking,qyura_medicartOffer.medicartOffer_startDate,'
                . 'qyura_medicartOffer.medicartOffer_endDate,qyura_medicartOffer.medicartOffer_discount,'
                . 'qyura_medicartOffer.medicartOffer_ageDiscount,qyura_medicartOffer.medicartOffer_actualPrice,'
                . 'qyura_medicartOffer.medicartOffer_discountPrice,qyura_medicartOffer.medicartOffer_title,qyura_medicartOffer.status,qyura_city.city_name,qyura_medicartOffer.medicartOffer_OfferId,'
               
                . '(CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_name WHEN(hospital_usersId is not null) THEN hospital_name END) as MIname,(select count(*) from qyura_medicartBooking where qyura_medicartBooking.medicartBooking_medicartOfferId = qyura_medicartOffer.medicartOffer_id and qyura_medicartBooking.medicartBooking_deleted =0) as totalBooking,'
                . '(select count(*) from qyura_medicartContect where qyura_medicartContect.medicartContect_medicartOfferId = qyura_medicartOffer.medicartOffer_id and qyura_medicartContect.medicartContect_deleted =0) as totalInquiries');
        
        
        $this->datatables->from('qyura_medicartOffer');
        
        $this->datatables->join('qyura_offerCat','qyura_offerCat.offerCat_id=qyura_medicartOffer.medicartOffer_offerCategory','left');
        $this->datatables->join('qyura_users','qyura_users.users_id=qyura_medicartOffer.medicartOffer_MIId','left');
        $this->datatables->join('qyura_hospital','qyura_hospital.hospital_usersId=qyura_users.users_id','left');  
        $this->datatables->join('qyura_diagnostic','qyura_diagnostic.diagnostic_usersId=qyura_users.users_id','left'); 
        
        $this->datatables->join('qyura_city','qyura_city.city_id=qyura_medicartOffer.medicartOffer_cityId','left'); 
        
        
//        $this->datatables->where(array("qyura_medicartOffer.medicartOffer_deleted" => 0,'qyura_users.users_deleted'=>0,'qyura_diagnostic.diagnostic_deleted'=>0,'qyura_offerCat.offerCat_deleted'=>0,'qyura_hospital.hospital_deleted'=>0));
        
        $this->datatables->where(array("qyura_medicartOffer.medicartOffer_deleted" => 0));
        $this->datatables->order_by('medicartOffer_id','asc');
        $city = $this->input->post('cityId');
        isset($city) && $city != '' ? $this->datatables->where('medicartOffer_cityId', $city) : '';
        $status = $this->input->post('statusId');
        isset($status) && $status != '' ? $this->datatables->where('qyura_medicartOffer.status', $status) : '';
        
        $this->datatables->add_column('medicartOffer_startDate','<h6>$1</h6>', 'dateFormateConvert(medicartOffer_startDate)');
        $this->datatables->add_column('medicartOffer_endDate','<h6>$1</h6>', 'dateFormateConvert(medicartOffer_endDate)');
        $this->datatables->add_column('medicartOffer_title','<h6>$1</h6>', 'medicartOffer_title');
        $this->datatables->add_column('medicartOffer_OfferId','<h6>$1</h6>', 'medicartOffer_OfferId');
        $this->datatables->add_column('MIname','<h6>$1</h6><p>$2</p>', 'MIname,city_name');
        $this->datatables->add_column('totalBooking','<h6>$1</h6>','totalBooking');
        $this->datatables->add_column('totalInquiries','<h6>$1</h6>','totalInquiries');
        $this->datatables->edit_column('status', '<h6>$1</h6>', 'checkStatus(status)');
        $this->datatables->add_column('action', '<a href="medicart/editOffer/$1" class="btn btn-warning waves-effect waves-light m-b-5 applist-btn">Edit</a>', 'medicartOffer_id');

       return  $this->datatables->generate();
       // return $this->datatables->last_query();
    }
    
    function fetchMedicartEnquiriesDataTables($condition = NULL) {

        $imgUrl = base_url() . 'assets/Medicart/$1';

        $this->datatables->select('qyura_medicartOffer.medicartOffer_id,'
                . 'qyura_medicartOffer.status,qyura_city.city_name,qyura_medicartOffer.medicartOffer_OfferId,'
                . 'qyura_medicartContect.medicartContect_name,qyura_medicartContect.medicartContect_mobileNo,qyura_medicartContect.medicartContect_email,qyura_medicartContect.medicartContect_id,qyura_medicartContect.medicartContect_enquiryId,'
                . 'qyura_medicartOffer.medicartOffer_title,'
                . '(CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_name WHEN(hospital_usersId is not null) THEN hospital_name END) as MIname');
        
        
        $this->datatables->from('qyura_medicartContect');
        
        $this->datatables->join('qyura_medicartOffer','qyura_medicartOffer.medicartOffer_id=qyura_medicartContect.medicartContect_medicartOfferId','left');
   
        $this->datatables->join('qyura_offerCat','qyura_offerCat.offerCat_id=qyura_medicartOffer.medicartOffer_offerCategory','left');
        $this->datatables->join('qyura_users','qyura_users.users_id=qyura_medicartOffer.medicartOffer_MIId','left');
        $this->datatables->join('qyura_hospital','qyura_hospital.hospital_usersId=qyura_users.users_id','left');  
        $this->datatables->join('qyura_diagnostic','qyura_diagnostic.diagnostic_usersId=qyura_users.users_id','left'); 
        $this->datatables->join('qyura_city','qyura_city.city_id=qyura_medicartOffer.medicartOffer_cityId','left'); 
        
        $this->datatables->where(array("qyura_medicartContect.medicartContect_deleted" => 0));
        $this->datatables->order_by('medicartContect_id','asc');
        $city = $this->input->post('cityId');
        isset($city) && $city != '' ? $this->datatables->where('qyura_medicartOffer.medicartOffer_cityId', $city) : '';
        

        $this->datatables->add_column('medicartContect_name','<h6>$1</h6>', 'medicartContect_name');
        $this->datatables->add_column('medicartContect_enquiryId','<h6>$1</h6>', 'medicartContect_enquiryId');
        $this->datatables->add_column('MIname','<h6>$1</h6><p>$2</p>', 'MIname,city_name');
        $this->datatables->add_column('medicartOffer_title','<h6>$1</h6>', 'medicartOffer_title');
        $this->datatables->add_column('medicartContect_mobileNo','<h6>$1</h6><p>$2</p>','medicartContect_mobileNo,medicartContect_email');

        $this->datatables->add_column('action', '<button class="btn btn-success waves-effect waves-light m-b-5" type="button">Reply</button>', 'medicartContect_id');

       return  $this->datatables->generate();
       // return $this->datatables->last_query();
    }
    
    function fetchMedicartBookingDataTables($condition = NULL) {

        $imgUrl = base_url() . 'assets/Medicart/$1';

        $this->datatables->select('qyura_medicartBooking.medicartBooking_id,qyura_medicartBooking.medicartBooking_preferredDate,'
                . 'qyura_medicartBooking.medicartBooking_message,qyura_medicartBooking.medicartBooking_bkStatus,'
                . 'qyura_medicartOffer.medicartOffer_title,'
                . '(CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_name WHEN(hospital_usersId is not null) THEN hospital_name END) as MIname,qyura_patientDetails.patientDetails_patientName,qyura_patientDetails.patientDetails_pLastName,qyura_users.users_mobile,qyura_users.users_email,qyura_city.city_name,qyura_medicartBooking.medicartBooking_bookId');
        
        
        $this->datatables->from('qyura_medicartBooking');
        
        $this->datatables->join('qyura_medicartOffer','qyura_medicartOffer.medicartOffer_id=qyura_medicartBooking.medicartBooking_medicartOfferId','left');
   
        $this->datatables->join('qyura_offerCat','qyura_offerCat.offerCat_id=qyura_medicartOffer.medicartOffer_offerCategory','left');
        $this->datatables->join('qyura_users','qyura_users.users_id=qyura_medicartBooking.medicartBooking_usersId','left');
        
        $this->datatables->join('qyura_patientDetails','qyura_patientDetails.patientDetails_usersId=qyura_medicartBooking.medicartBooking_usersId','left');
        
        
        $this->datatables->join('qyura_hospital','qyura_hospital.hospital_usersId=qyura_medicartOffer.medicartOffer_MIId','left');  
        
        $this->datatables->join('qyura_diagnostic','qyura_diagnostic.diagnostic_usersId=qyura_medicartOffer.medicartOffer_MIId','left'); 
        
        $this->datatables->join('qyura_city','qyura_city.city_id=qyura_medicartOffer.medicartOffer_cityId','left'); 
        
        $this->datatables->where(array("qyura_medicartBooking.medicartBooking_deleted" => 0));
        $this->datatables->order_by('medicartBooking_id','asc');
        $city = $this->input->post('cityId');
        isset($city) && $city != '' ? $this->datatables->where('qyura_medicartOffer.medicartOffer_cityId', $city) : '';
        

        $this->datatables->add_column('medicartBooking_preferredDate','<h6>$1</h6>', 'dateFormateConvert(medicartBooking_preferredDate)');
        $this->datatables->add_column('medicartBooking_bookId','<h6>$1</h6>', 'medicartBooking_bookId');
        $this->datatables->add_column('MIname','<h6>$1</h6><p>$2</p>', 'MIname,city_name');
         $this->datatables->add_column('patientDetails_patientName','<h6>$1 $2</h6>', 'patientDetails_patientName,patientDetails_pLastName');
        $this->datatables->add_column('medicartOffer_title','<h6>$1</h6>', 'medicartOffer_title');
        $this->datatables->add_column('users_mobile','<h6>$1</h6><p>$2</p>','users_mobile,users_email');

        $this->datatables->add_column('action', '<button class="btn btn-success waves-effect waves-light m-b-5" type="button">Reply</button>', 'medicartBooking_id');

       return  $this->datatables->generate();
       // return $this->datatables->last_query();
    }
    
    function createCSVdata($where) {
        $imgUrl = base_url() . 'assets/ambulanceImages/thumb/original/';
        $this->db->select('ambulance_img,ambulance_name,city_name,ambulance_phn,ambulance_address');
        $this->db->from('qyura_ambulance');
        $this->db->join('qyura_city', 'city_id = ambulance_cityId', 'left');
        foreach ($where as $key => $val) {

            if ($where[$key] === 0) {
                $this->db->where($key, $val);
            }
            if ($where[$key] != '') {
                $this->db->where($key, $val);
            }
        }

        $data = $this->db->get();
        $result = array();
        $i = 1;
        foreach ($data->result() as $key => $val) {
            $result[$i]['ambulance_img'] = $imgUrl . $val->ambulance_img;
            $result[$i]['ambulance_name'] = $val->ambulance_name;
            $result[$i]['city_name'] = $val->city_name;
            $result[$i]['ambulance_phn'] = $val->ambulance_phn;
            $result[$i]['ambulance_address'] = $val->ambulance_address;
            $i++;
        }
        return $result;
    }
   

}
