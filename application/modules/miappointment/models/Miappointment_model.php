<?php

class Miappointment_model extends Common_model {

    function __construct() {
        parent::__construct();
        //$this->load->helper(array());
    }

    function getDiagnostic1($condition = NULL) {
        $now = time();
        $this->datatables->select("qyura_quotations.quotation_MiId,qyura_quotations.quotation_id, qyura_quotations.quotation_dateTime as dateTime, (CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_name WHEN(hospital_usersId is not null) THEN hospital_name END) as MIname, qyura_diagnosticsCat.diagnosticsCat_catName AS diagCatName, CASE WHEN (qyura_quotations.quotation_familyId <> 0 ) THEN qyura_usersFamily.usersfamily_name ELSE qyura_patientDetails.patientDetails_patientName END AS userName, qyura_quotationBooking.quotationBooking_orderId AS orderId, CASE WHEN (qyura_quotations.quotation_familyId <> 0 ) THEN qyura_usersFamily.usersfamily_gender ELSE qyura_patientDetails.patientDetails_gender END AS userGender, CASE WHEN (qyura_quotations.quotation_familyId <> 0 ) THEN qyura_usersFamily.usersfamily_age ELSE (FROM_UNIXTIME('{$now}', '%Y') - FROM_UNIXTIME(qyura_patientDetails.patientDetails_dob, '%Y')) END AS userAge,qyura_quotationBooking.quotationBooking_bookStatus as bookStatus");

        $this->datatables->from("qyura_quotationBooking");
        $this->datatables->join("transactionInfo", "transactionInfo.order_no = qyura_quotationBooking.quotationBooking_orderId", "left");
        $this->datatables->join("qyura_quotations ", " qyura_quotations.quotation_id=qyura_quotationBooking.quotationBooking_quotationId", "left");
        $this->datatables->join("qyura_users ", " qyura_users.users_id=qyura_quotations.quotation_userId", "left");
        $this->datatables->join("qyura_patientDetails ", " qyura_patientDetails.patientDetails_usersId=qyura_quotationBooking.quotationBooking_userId", "left");
        $this->datatables->join("qyura_usersFamily ", " qyura_usersFamily.usersfamily_id=qyura_quotations.quotation_familyId", "left");
        $this->datatables->join("qyura_hospital ", " qyura_hospital.hospital_usersId=qyura_quotations.quotation_MiId", "left");
        $this->datatables->join("qyura_diagnostic ", " qyura_diagnostic.diagnostic_usersId=qyura_quotations.quotation_MiId", "left");
        $this->datatables->join("qyura_diagnosticsCat ", " qyura_diagnosticsCat.diagnosticsCat_catId=qyura_quotations.quotation_diagnosticsCatId", "left");
        
        $dateFilter = $this->date_range($_POST['startDate'], $_POST['endDate'], 'qyura_quotations.quotation_dateTime');

        if ($dateFilter != NULL && $dateFilter != '')
            $this->datatables->where($dateFilter);

        $this->datatables->where(array("qyura_quotationBooking.quotationBooking_deleted" => 0, "qyura_quotations.quotation_dateTime <>" => 0));
        $this->datatables->add_column('orderId', '<h6>$1</h6><p>$2</p>', 'orderId,dateFormate(dateTime)');
        $this->datatables->add_column('userName', '<h6>$1</h6><p>$2|$3</p>', 'userName,userGender,userAge');
        $this->datatables->add_column('diagCatName', '<h6>$1</h6>', 'diagCatName');
        $this->datatables->add_column('MIname', '<h6>$1</h6>', 'MIname');
        $this->datatables->add_column('bookStatus', '$1', 'getStatusDropDown(bookStatus)');
        $this->datatables->add_column('action', '<p><a  class="btn btn-warning waves-effect waves-light m-b-5 applist-btn" href="' . site_url('miappointment/detail') . '/$1">View Detail</a></p><button type="button" onclick="getTimeSloat($2)" class="btn btn-success waves-effect waves-light m-b-5 applist-btn">Change Timing</button>', 'quotation_id,quotation_MiId');
        $this->datatables->add_column('action', '<p><a  class="btn btn-warning waves-effect waves-light m-b-5 applist-btn" href="' . site_url('miappointment/detail') . '/$1">View Detail</a></p><button type="button" onclick="getTimeSloat($2,$3)" class="btn btn-success waves-effect waves-light m-b-5 applist-btn">Change Timing</button>', 'quotation_id,quotation_MiId,timeSlotId');
        return $this->datatables->generate();
    }
    
     function getDiagnostic($condition = NULL) {
        $now = time();
        $this->datatables->select("qyura_quotations.quotation_timeSlotId as timeSlotId,qyura_quotations.quotation_MiId,qyura_quotations.quotation_id, qyura_quotations.quotation_dateTime as dateTime, (CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_name WHEN(hospital_usersId is not null) THEN hospital_name END) as MIname, qyura_diagnosticsCat.diagnosticsCat_catName AS diagCatName, CASE WHEN (qyura_quotations.quotation_familyId <> 0 ) THEN qyura_usersFamily.usersfamily_name ELSE qyura_patientDetails.patientDetails_patientName END AS userName, qyura_quotationBooking.quotationBooking_orderId AS orderId, CASE WHEN (qyura_quotations.quotation_familyId <> 0 ) THEN qyura_usersFamily.usersfamily_gender ELSE qyura_patientDetails.patientDetails_gender END AS userGender, CASE WHEN (qyura_quotations.quotation_familyId <> 0 ) THEN qyura_usersFamily.usersfamily_age ELSE (FROM_UNIXTIME('{$now}', '%Y') - FROM_UNIXTIME(qyura_patientDetails.patientDetails_dob, '%Y')) END AS userAge,qyura_quotationBooking.quotationBooking_bookStatus as bookStatus");


        $this->datatables->from("qyura_quotationBooking");

        $this->datatables->join("transactionInfo", "transactionInfo.order_no = qyura_quotationBooking.quotationBooking_orderId", "left");
        $this->datatables->join("qyura_quotations ", " qyura_quotations.quotation_id=qyura_quotationBooking.quotationBooking_quotationId", "left");
        $this->datatables->join("qyura_users ", " qyura_users.users_id=qyura_quotations.quotation_userId", "left");
        $this->datatables->join("qyura_patientDetails ", " qyura_patientDetails.patientDetails_usersId=qyura_quotationBooking.quotationBooking_userId", "left");
        $this->datatables->join("qyura_usersFamily ", " qyura_usersFamily.usersfamily_id=qyura_quotations.quotation_familyId", "left");
        $this->datatables->join("qyura_hospital ", " qyura_hospital.hospital_usersId=qyura_quotations.quotation_MiId", "left");
        $this->datatables->join("qyura_diagnostic ", " qyura_diagnostic.diagnostic_usersId=qyura_quotations.quotation_MiId", "left");
        $this->datatables->join("qyura_diagnosticsCat ", " qyura_diagnosticsCat.diagnosticsCat_catId=qyura_quotations.quotation_diagnosticsCatId", "left");

        $dateFilter = $this->date_range($_POST['startDate'], $_POST['endDate'], 'qyura_quotations.quotation_dateTime');


        if ($dateFilter != NULL && $dateFilter != '')
            $this->datatables->where($dateFilter);

        $this->datatables->where(array("qyura_quotationBooking.quotationBooking_deleted" => 0, "qyura_quotations.quotation_dateTime <>" => 0));

        $this->datatables->edit_column('orderId', '<h6>$1</h6><p>$2</p>', 'orderId,dateFormate(dateTime)');

        $this->datatables->add_column('userName', '<h6>$1</h6><p>$2|$3</p>', 'userName,userGender,userAge');

        $this->datatables->add_column('diagCatName', '<h6>$1</h6>', 'diagCatName');

        $this->datatables->add_column('MIname', '<h6>$1</h6>', 'MIname');

        $this->datatables->edit_column('bookStatus', '$1', 'getStatusDropDown(bookStatus)');

        $this->datatables->add_column('action', '<p><a  class="btn btn-warning waves-effect waves-light m-b-5 applist-btn" href="' . site_url('miappointment/detail') . '/$1">View Detail</a></p><button type="button" onclick="getTimeSloat($2,$3)" class="btn btn-success waves-effect waves-light m-b-5 applist-btn">Change Timing</button>', 'quotation_id,quotation_MiId,timeSlotId');

        return $this->datatables->generate();
    }

    public function date_range($startdateTime = false, $enddateTime = false, $colName = 'date') {
        /* dateTime range filtartion */
        $startdateTime = strtotime($startdateTime);
        $enddateTime = strtotime($enddateTime);
        $sWhere = '';
        if ((isset($startdateTime) && !empty($startdateTime)) OR ( isset($enddateTime) && !empty($enddateTime))) {

            if ($startdateTime != "" AND $enddateTime != "") {
                $sWhere != '' ? $sWhere .= " AND ( {$colName} >= '$startdateTime' && {$colName} <= '$enddateTime' )" : $sWhere .= "( {$colName} >= '$startdateTime' && {$colName} <= '$enddateTime' )";
            } elseif ($startdateTime != "") {
                $sWhere != '' ? $sWhere .= " AND ( {$colName} = '$startdateTime' )" : $sWhere .= "( {$colName} >= '$startdateTime' )";
            } elseif ($enddateTime != "") {
                $sWhere != '' ? $sWhere .= " AND ( {$colName} = '$enddateTime' )" : $sWhere .= "( {$colName} <= '$enddateTime' )";
            }
            return $sWhere;
            //$this->db->where($sWhere);
        }
    }
    
    public function getDetail($qtnId)
    {
        $now = time();
        $this->db->select("qyura_quotations.quotation_timeSlotId as timeSlotId,qyura_quotations.quotation_MiId,qyura_quotations.quotation_id, qyura_quotations.quotation_dateTime as dateTime, (CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_mblNo WHEN(hospital_usersId is not null) THEN hospital_mblNo END) as MImblNo, (CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_name WHEN(hospital_usersId is not null) THEN hospital_name END) as MIname, (CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_hmsId WHEN(hospital_usersId is not null) THEN hospital_hmsId END) as hmsId, (CASE WHEN(diagnostic_usersId is not null) THEN CONCAT_WS(' - ',diagnosticCenterTimeSlot_startTime, diagnosticCenterTimeSlot_endTime,diagnosticCenterTimeSlot_sessionType) WHEN(hospital_usersId is not null) THEN CONCAT_WS('-',hospitalTimeSlot_startTime, hospitalTimeSlot_endTime,hospitalTimeSlot_sessionType) END) as timeSlot, qyura_diagnosticsCat.diagnosticsCat_catName AS diagCatName, qyura_quotationBooking.quotationBooking_orderId AS orderId, qyura_quotationBooking.quotationBooking_bookStatus as bookStatus,CASE transactionInfo.payment_status WHEN '1' THEN 'Success' WHEN 4 THEN 'Aborted' WHEN 5 THEN 'Failure' ELSE NULL END AS paymentStatus, transactionInfo.payment_method AS paymentMethod,(CASE WHEN(diagnostic_usersId is not null) THEN diagnostic_img WHEN(hospital_usersId is not null) THEN hospital_img END) as MIimg,(CASE WHEN(diagnostic_usersId is not null) THEN 'diagnostic' WHEN(hospital_usersId is not null) THEN 'hospital' END) as type ");

        $this->db->from("qyura_quotationBooking");
        $this->db->join("transactionInfo", "transactionInfo.order_no = qyura_quotationBooking.quotationBooking_orderId", "left");
        $this->db->join("qyura_quotations ", "qyura_quotations.quotation_id=qyura_quotationBooking.quotationBooking_quotationId", "left");
        $this->db->join("qyura_users ", " qyura_users.users_id=qyura_quotations.quotation_userId", "left");
        $this->db->join("qyura_patientDetails ", " qyura_patientDetails.patientDetails_usersId=qyura_quotationBooking.quotationBooking_userId", "left");
        $this->db->join("qyura_usersFamily ", " qyura_usersFamily.usersfamily_id=qyura_quotations.quotation_familyId", "left");
        $this->db->join("qyura_hospital ", " qyura_hospital.hospital_usersId=qyura_quotations.quotation_MiId", "left");
        $this->db->join("qyura_diagnostic", "qyura_diagnostic.diagnostic_usersId=qyura_quotations.quotation_MiId", "left");
        $this->db->join("qyura_diagnosticCenterTimeSlot ", "qyura_diagnosticCenterTimeSlot.diagnosticCenterTimeSlot_id=qyura_quotations.quotation_timeSlotId", "left");
        $this->db->join("qyura_hospitalTimeSlot ", "qyura_hospitalTimeSlot.hospitalTimeSlot_id=qyura_quotations.quotation_timeSlotId", "left");
        $this->db->join("qyura_diagnosticsCat ", " qyura_diagnosticsCat.diagnosticsCat_catId=qyura_quotations.quotation_diagnosticsCatId", "left");
        $this->db->where(array("qyura_quotationBooking.quotationBooking_deleted" => 0,'qyura_quotations.quotation_id'=>$qtnId));
        $data = $this->db->get()->row();
        
        if(isset($data) && !empty($data) && $data != null)
            return $data;
        else
            return FALSE;
    }
    
    public function getQuotationTests($qtnId) {

        $option = array(
            'select' => 'qyura_quotations.quotation_id,qyura_quotationDetailTests.quotationDetailTests_id as testId,qyura_quotationDetailTests.quotationDetailTests_quotationDetailId as qtDetailId,qyura_quotationDetailTests.quotationDetailTests_diagnosticCatId as diagCatId,qyura_diagnosticsCat.diagnosticsCat_catName as diagCatName,qyura_quotationDetailTests.quotationDetailTests_testName as testName,qyura_quotationDetailTests.quotationDetailTests_price as price,qyura_quotationDetailTests.quotationDetailTests_date as dateTime,qyura_quotationDetailTests.quotationDetailTests_instruction as instruction,qyura_quotationDetail.quotationDetail_prescription as prescription,qyura_reports.report_report as report',
            'table' => 'qyura_quotations',
            'join' => array(
                array('qyura_quotationBooking', 'qyura_quotationBooking.quotationBooking_quotationId=qyura_quotations.quotation_id', 'left'),
                array('qyura_reports', 'qyura_reports.report_bookingOrderId=qyura_quotationBooking.quotationBooking_orderId', 'left'),
                array('qyura_quotationDetailTests', 'qyura_quotationDetailTests.quotationDetailTests_quotationId=qyura_quotations.quotation_id', 'right'),
                array('qyura_diagnosticsCat', 'qyura_diagnosticsCat.diagnosticsCat_catId=qyura_quotationDetailTests.quotationDetailTests_diagnosticCatId', 'left'),
                array('qyura_quotationDetail', 'qyura_quotationDetail.quotationDetail_id=qyura_quotationDetailTests.quotationDetailTests_quotationDetailId', 'left')
            ),
            'where' => array('qyura_quotations.quotation_id' => $qtnId,'qyura_quotations.quotation_deleted'=>0,'qyura_quotationDetailTests.quotationDetailTests_deleted'=>0)
        );

        $quotationTests = $this->customGet($option);
        
        if(isset($quotationTests) && $quotationTests != null)
        {
            return $quotationTests;
        }
        else
            return false;
    }
    
    public function getQuotationUserDetail($qtnId)
    {
        $now = time();
        $this->db->select("CASE WHEN (qyura_quotations.quotation_familyId <> 0 ) THEN qyura_usersFamily.usersfamily_name ELSE qyura_patientDetails.patientDetails_patientName END AS userName,  CASE WHEN (qyura_quotations.quotation_familyId <> 0 ) THEN qyura_usersFamily.usersfamily_gender ELSE qyura_patientDetails.patientDetails_gender END AS userGender, CASE WHEN (qyura_quotations.quotation_familyId <> 0 ) THEN qyura_usersFamily.usersfamily_age ELSE (FROM_UNIXTIME('{$now}', '%Y') - FROM_UNIXTIME(qyura_patientDetails.patientDetails_dob, '%Y')) END AS userAge,qyura_patientDetails.patientDetails_address as address,qyura_country.country,qyura_state.state_statename,qyura_city.city_name,qyura_patientDetails.patientDetails_pin as pin,qyura_users.users_mobile as mobile,qyura_patientDetails.patientDetails_patientImg as patientImg")
        ->from("qyura_quotationBooking")
        ->join("qyura_quotations ", "qyura_quotations.quotation_id=qyura_quotationBooking.quotationBooking_quotationId", "left")
        ->join("qyura_patientDetails ", " qyura_patientDetails.patientDetails_usersId=qyura_quotationBooking.quotationBooking_userId", "left")
        ->join("qyura_users", "qyura_users.users_id=qyura_quotations.quotation_userId", "left")
        ->join("qyura_usersFamily", "qyura_usersFamily.usersfamily_id=qyura_quotations.quotation_familyId", "left")
        ->join("qyura_country", "qyura_country.country_id=qyura_patientDetails.patientDetails_countryId", "left")
        ->join("qyura_state", "qyura_state.state_id=qyura_patientDetails.patientDetails_stateId", "left")
        ->join("qyura_city", "qyura_city.city_id=qyura_patientDetails.patientDetails_cityId", "left")
        ->where(array("qyura_quotationBooking.quotationBooking_deleted" => 0,'qyura_quotationBooking.quotationBooking_quotationId'=>$qtnId));
        $data = $this->db->get()->row();
        if(isset($data) && !empty($data) && $data != null)
            return $data;
        else
            return FALSE;
    }
    
    public function qtTestTotalAmount($qtnId)
    {
        $option = array(
            'select' => 'sum(qyura_quotationDetailTests.quotationDetailTests_price) as price',
            'table' => 'qyura_quotations',
            'join' => array(
                array('qyura_quotationDetailTests', 'qyura_quotationDetailTests.quotationDetailTests_quotationId=qyura_quotations.quotation_id', 'right')
                
            ),
            'where' => array('qyura_quotations.quotation_id' => $qtnId,'qyura_quotations.quotation_deleted'=>0,'qyura_quotationDetailTests.quotationDetailTests_deleted'=>0),
            'limit'=>1,
            'single'=>TRUE
            
        );

        $quotationTests = $this->customGet($option);
        
        return $quotationTests;
    }
    
    public function getConsultingData($appointmentId)
    {
        
        
        $now = time();
        $this->db->select("qyura_doctorAppointment.doctorAppointment_doctorUserId as doctorUserId,qyura_doctorAppointment.doctorAppointment_doctorParentId as doctorParentId,qyura_doctorAppointment.doctorAppointment_id as id,qyura_users.users_username AS title, qyura_doctorAppointment.doctorAppointment_date AS dateTime, CASE WHEN (qyura_doctorAppointment.doctorAppointment_docType = 1 ) THEN qyura_hospital.hospital_address WHEN (qyura_doctorAppointment.doctorAppointment_docType = 2 ) THEN qyura_diagnostic.diagnostic_address ELSE qyura_doctors.doctor_addr END AS address, CASE WHEN (qyura_doctorAppointment.doctorAppointment_docType = 1 ) THEN qyura_hospital.hospital_img WHEN (qyura_doctorAppointment.doctorAppointment_docType = 2 ) THEN qyura_diagnostic.diagnostic_img ELSE qyura_doctors.doctors_img END AS MIimg, CASE WHEN (qyura_doctorAppointment.doctorAppointment_docType = 1 ) THEN qyura_hospital.hospital_name WHEN (qyura_doctorAppointment.doctorAppointment_docType = 2 ) THEN qyura_diagnostic.diagnostic_name ELSE qyura_doctors.doctor_addr END AS MIname, qyura_doctorAppointment.doctorAppointment_unqId AS orderId, CASE qyura_doctorAppointment.doctorAppointment_status WHEN '0' THEN 'pending' WHEN '1' THEN 'confirmed' ELSE NULL END AS bookingStatus, CASE transactionInfo.payment_status WHEN '1' THEN 'Success' WHEN 4 THEN 'Aborted' WHEN 5 THEN 'Failure' ELSE NULL END AS paymentStatus, CASE WHEN (qyura_doctorAppointment.doctorAppointment_memberId <> 0 ) THEN qyura_usersFamily.usersfamily_name ELSE qyura_patientDetails.patientDetails_patientName END AS userName, CASE WHEN (qyura_doctorAppointment.doctorAppointment_memberId <> 0 ) THEN qyura_usersFamily.usersfamily_gender ELSE qyura_patientDetails.patientDetails_gender END AS userGender, qyura_users.users_mobile AS usersMobile, CASE WHEN (qyura_doctorAppointment.doctorAppointment_memberId <> 0 ) THEN qyura_usersFamily.usersfamily_age ELSE (FROM_UNIXTIME('{$now}', '%Y') - FROM_UNIXTIME(qyura_patientDetails.patientDetails_dob, '%Y')) END AS userAge, transactionInfo.payment_method AS paymentMethod, qyura_doctorAppointment.doctorAppointment_ptRmk AS remark, '' AS diagCatName, qyura_specialities.specialities_name AS speciality, 'Consultation' AS type, (CASE WHEN(qyura_doctorAppointment.doctorAppointment_date > CURRENT_TIMESTAMP ) THEN 'Upcoming' ELSE 'Completed' END) AS upcomingStatus,patient.users_mobile as mobile,qyura_doctorAvailabilitySession.doctorAvailabilitySession_start as startTime,qyura_doctorAvailabilitySession.doctorAvailabilitySession_end as endTime,qyura_doctorAvailabilitySession.doctorAvailabilitySession_type as sessionType,doctorAppointment_ptRmk as remarks,qyura_patientDetails.patientDetails_patientImg as patientImg,qyura_country.country,qyura_state.state_statename,qyura_city.city_name,qyura_doctorAppointment.doctorAppointment_consulationFee as consulationFee,qyura_doctorAppointment.doctorAppointment_otherFee as otherFee,qyura_doctorAppointment.doctorAppointment_tax as tax,qyura_doctorAppointment.doctorAppointment_totPayAmount as totPayAmount");

        $this->db->from("qyura_doctorAppointment");
        $this->db->join("transactionInfo", "transactionInfo.order_no = qyura_doctorAppointment.doctorAppointment_unqId", "left");
        $this->db->join("qyura_users", "qyura_users.users_id=qyura_doctorAppointment.doctorAppointment_doctorUserId", "left");
        $this->db->join("qyura_users as patient", "patient.users_id=qyura_doctorAppointment.doctorAppointment_pntUserId", "left");
        $this->db->join("qyura_doctorAvailabilitySession", "qyura_doctorAvailabilitySession.doctorAvailabilitySession_id=qyura_doctorAppointment.doctorAppointment_finalTiming", "left");
        
        $this->db->join("qyura_patientDetails", "qyura_patientDetails.patientDetails_usersId=qyura_doctorAppointment.doctorAppointment_pntUserId", "left");
        $this->db->join("qyura_usersFamily", "qyura_usersFamily.usersfamily_id=qyura_doctorAppointment.doctorAppointment_memberId", "left");
        $this->db->join("qyura_country", "qyura_country.country_id=qyura_patientDetails.patientDetails_countryId", "left");
        $this->db->join("qyura_state", "qyura_state.state_id=qyura_patientDetails.patientDetails_stateId", "left");
        $this->db->join("qyura_city", "qyura_city.city_id=qyura_patientDetails.patientDetails_cityId", "left");
                
        $this->db->join("qyura_hospital", "qyura_hospital.hospital_usersId=qyura_doctorAppointment.doctorAppointment_doctorParentId", "left");
        $this->db->join("qyura_doctors", "qyura_doctors.doctors_userId=qyura_doctorAppointment.doctorAppointment_doctorUserId", "left");
        $this->db->join("qyura_diagnostic", "qyura_diagnostic.diagnostic_usersId=qyura_doctorAppointment.doctorAppointment_doctorParentId", "left");
        $this->db->join("qyura_specialities", "qyura_specialities.specialities_id=qyura_doctorAppointment.doctorAppointment_specialitiesId", "left");
        
        $this->db->where(array("qyura_doctorAppointment.doctorAppointment_deleted" => 0, "qyura_doctorAppointment.doctorAppointment_date <>" => 0,"qyura_doctorAppointment.doctorAppointment_docType <>"=>3,"qyura_doctorAppointment.doctorAppointment_id"=>$appointmentId));
        $this->db->group_by('qyura_doctorAppointment.doctorAppointment_unqId');
        
        $data = $this->db->get()->row();
        //dump($this->db->last_query());
        if(isset($data) && !empty($data) && $data != null)
            return $data;
        else
            return FALSE;
    }

    public function getConsultingList()
    {
        $now = time();
        $this->datatables->select("qyura_doctorAppointment.doctorAppointment_doctorUserId as doctorUserId,qyura_doctorAppointment.doctorAppointment_doctorParentId as doctorParentId,qyura_doctorAppointment.doctorAppointment_id as id,qyura_users.users_username AS title, qyura_doctorAppointment.doctorAppointment_date AS dateTime, CASE WHEN (qyura_doctorAppointment.doctorAppointment_docType = 1 ) THEN qyura_hospital.hospital_address WHEN (qyura_doctorAppointment.doctorAppointment_docType = 2 ) THEN qyura_diagnostic.diagnostic_address ELSE qyura_doctors.doctor_addr END AS address, CASE WHEN (qyura_doctorAppointment.doctorAppointment_docType = 1 ) THEN qyura_hospital.hospital_name WHEN (qyura_doctorAppointment.doctorAppointment_docType = 2 ) THEN qyura_diagnostic.diagnostic_name ELSE qyura_doctors.doctor_addr END AS MIname, qyura_doctorAppointment.doctorAppointment_unqId AS orderId, CASE qyura_doctorAppointment.doctorAppointment_status WHEN '0' THEN 'pending' WHEN '1' THEN 'confirmed' ELSE NULL END AS bookingStatus, CASE transactionInfo.payment_status WHEN '1' THEN 'Success' WHEN 4 THEN 'Aborted' WHEN 5 THEN 'Failure' ELSE NULL END AS paymentStatus, CASE WHEN (qyura_doctorAppointment.doctorAppointment_memberId <> 0 ) THEN qyura_usersFamily.usersfamily_name ELSE qyura_patientDetails.patientDetails_patientName END AS userName, CASE WHEN (qyura_doctorAppointment.doctorAppointment_memberId <> 0 ) THEN qyura_usersFamily.usersfamily_gender ELSE qyura_patientDetails.patientDetails_gender END AS userGender, qyura_users.users_mobile AS usersMobile, CASE WHEN (qyura_doctorAppointment.doctorAppointment_memberId <> 0 ) THEN qyura_usersFamily.usersfamily_age ELSE (FROM_UNIXTIME('{$now}', '%Y') - FROM_UNIXTIME(qyura_patientDetails.patientDetails_dob, '%Y')) END AS userAge, transactionInfo.payment_method AS paymentMethod, qyura_doctorAppointment.doctorAppointment_ptRmk AS remark, '' AS diagCatName, qyura_specialities.specialities_name AS speciality, 'Consultation' AS type, (CASE WHEN(qyura_doctorAppointment.doctorAppointment_date > CURRENT_TIMESTAMP ) THEN 'Upcoming' ELSE 'Completed' END) AS upcomingStatus");

        $this->datatables->from("qyura_doctorAppointment");
        $this->datatables->join("transactionInfo", "transactionInfo.order_no = qyura_doctorAppointment.doctorAppointment_unqId", "left");
        $this->datatables->join("qyura_users", "qyura_users.users_id=qyura_doctorAppointment.doctorAppointment_doctorUserId", "left");
        $this->datatables->join("qyura_patientDetails", "qyura_patientDetails.patientDetails_usersId=qyura_doctorAppointment.doctorAppointment_pntUserId", "left");
        $this->datatables->join("qyura_usersFamily", "qyura_usersFamily.usersfamily_id=qyura_doctorAppointment.doctorAppointment_memberId", "left");
        $this->datatables->join("qyura_hospital", "qyura_hospital.hospital_usersId=qyura_doctorAppointment.doctorAppointment_doctorParentId", "left");
        $this->datatables->join("qyura_doctors", "qyura_doctors.doctors_userId=qyura_doctorAppointment.doctorAppointment_doctorUserId", "left");
        $this->datatables->join("qyura_diagnostic", "qyura_diagnostic.diagnostic_usersId=qyura_doctorAppointment.doctorAppointment_doctorParentId", "left");
        $this->datatables->join("qyura_specialities", "qyura_specialities.specialities_id=qyura_doctorAppointment.doctorAppointment_specialitiesId", "left");
        
        $dateFilter = $this->date_range($_POST['startDate'], $_POST['endDate'], 'qyura_diagnosticAppointment.diagnosticAppointment_date');

        if ($dateFilter != NULL && $dateFilter != '')
            $this->datatables->where($dateFilter);

        $this->datatables->where(array("qyura_doctorAppointment.doctorAppointment_deleted" => 0, "qyura_doctorAppointment.doctorAppointment_date <>" => 0,"qyura_doctorAppointment.doctorAppointment_docType <>"=>3));
        $this->datatables->group_by('qyura_doctorAppointment.doctorAppointment_unqId');
        $this->datatables->edit_column('orderId', '<h6>$1</h6><p>$2</p>', 'orderId,dateFormate(dateTime)');
        $this->datatables->add_column('userName', '<h6>$1</h6><p>$2|$3</p>', 'userName,userGender,userAge');
        $this->datatables->add_column('doctorDeatil', '<h6>$1</h6><p>$2</p>', 'title,MIname');
        $this->datatables->edit_column('bookStatus', '$1', 'bookingStatus');
        $this->datatables->add_column('action', '<p><a  class="btn btn-warning waves-effect waves-light m-b-5 applist-btn" href="' . site_url('miappointment/consultingDetail') . '/$1">View Detail</a></p><button type="button" onclick="getTimeSloat($2)" class="btn btn-success waves-effect waves-light m-b-5 applist-btn">Change Timing</button>', 'id,doctorUserId,doctorParentId');
        
        return $this->datatables->generate();
        
    }
    
    public function getConsultingReport($appointmentId) {

        $option = array(
            'select' => 'qyura_reports.report_report as report',
            'table' => 'qyura_doctorAppointment',
            'join' => array(
                array('qyura_reports', 'qyura_reports.report_bookingOrderId=qyura_doctorAppointment.doctorAppointment_unqId', 'left'),
            ),
            'where' => array('qyura_doctorAppointment.doctorAppointment_id' => $appointmentId,'qyura_doctorAppointment.doctorAppointment_deleted'=>0)
        );

        $quotationTests = $this->customGet($option);
        
        if(isset($quotationTests) && $quotationTests != null)
        {
            return $quotationTests;
        }
        else
            return false;
    }
    
    public function getTimeSlot($Mid)
    {
        $this->db->select("(CASE WHEN(diagnostic_usersId IS NOT NULL) THEN CONCAT_WS(' - ',diagnosticCenterTimeSlot_startTime, diagnosticCenterTimeSlot_endTime,diagnosticCenterTimeSlot_sessionType) WHEN(hospital_usersId IS NOT NULL) THEN CONCAT_WS('-',hospitalTimeSlot_startTime, hospitalTimeSlot_endTime,hospitalTimeSlot_sessionType) END) AS timeSlot,
qyura_quotations.quotation_MiId,quotation_timeSlotId,quotation_dateTime,
(CASE WHEN(diagnostic_usersId IS NOT NULL) THEN  diagnosticCenterTimeSlot_id WHEN(hospital_usersId IS NOT NULL) THEN hospitalTimeSlot_id END) AS timesloatAtId");
        $this->db->from("qyura_quotations");
        $this->db->where(array("qyura_quotations.quotation_MiId" => $Mid));
        $this->db->join("qyura_hospital", "qyura_hospital.hospital_usersId = qyura_quotations.quotation_MiId", "left");
        $this->db->join("qyura_hospitalTimeSlot", "qyura_hospitalTimeSlot.hospitalTimeSlot_hospitalId = qyura_hospital.hospital_id", "left");
        $this->db->join("qyura_diagnostic", "qyura_diagnostic.diagnostic_usersId = qyura_quotations.quotation_MiId", "left");
        $this->db->join("qyura_diagnosticCenterTimeSlot", "qyura_diagnosticCenterTimeSlot.diagnosticCenterTimeSlot_diagnosticId = qyura_diagnostic.diagnostic_id", "left");
        $this->db->group_by('timesloatAtId');

        $data = $this->db->get()->result();
        
        if(isset($data) && $data != null)
        {
            return $data;
        }
        else
            return false;
    }
    
    
}
