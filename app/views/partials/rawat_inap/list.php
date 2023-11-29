<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Rawat Inap</h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("rawat_inap/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Tambah SEP Rawat Inap 
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('rawat_inap'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('rawat_inap'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('rawat_inap'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 comp-grid">
                        <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                            <div class="card mb-3">
                                <div class="card-header h4 h4">Filter by Tanggal Masuk</div>
                                <div class="p-2">
                                    <input class="form-control datepicker"  value="<?php echo $this->set_field_value('rawat_inap_Tanggal_Masuk') ?>" type="datetime"  name="rawat_inap_Tanggal_Masuk" placeholder="" data-enable-time="" data-date-format="Y-m-d" data-alt-format="M j, Y" data-inline="false" data-no-calendar="false" data-mode="range" />
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group text-center">
                                    <button class="btn btn-primary">Filter</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 comp-grid">
                            <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                                <div class="card mb-3">
                                    <div class="card-header h4 h4">Filter by Tanggal Keluar</div>
                                    <div class="p-2">
                                        <input class="form-control datepicker"  value="<?php echo $this->set_field_value('rawat_inap_Tanggal_Keluar') ?>" type="datetime"  name="rawat_inap_Tanggal_Keluar" placeholder="" data-enable-time="" data-date-format="Y-m-d" data-alt-format="M j, Y" data-inline="false" data-no-calendar="false" data-mode="range" />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary">Filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <div  class="">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-md-12 comp-grid">
                                <?php $this :: display_page_errors(); ?>
                                <div class="filter-tags mb-2">
                                    <?php
                                    if(!empty($_GET['rawat_inap_Tanggal_Masuk'])){
                                    ?>
                                    <div class="filter-chip card bg-light">
                                        <b>Rawat Inap Tanggal Masuk :</b> 
                                        <?php
                                        $date_val = get_value('rawat_inap_Tanggal_Masuk');
                                        $formated_date = "";
                                        if(str_contains('-to-', $date_val)){
                                        //if value is a range date
                                        $vals = explode('-to-' , str_replace(' ' , '' , $date_val));
                                        $startdate = $vals[0];
                                        $enddate = $vals[1];
                                        $formated_date = format_date($startdate, 'jS F, Y') . ' <span class="text-muted">&#10148;</span> ' . format_date($enddate, 'jS F, Y');
                                        }
                                        elseif(str_contains(',', $date_val)){
                                        //multi date values
                                        $vals = explode(',' , str_replace(' ' , '' , $date_val));
                                        $formated_arrs = array_map(function($date){return format_date($date, 'jS F, Y');}, $vals);
                                        $formated_date = implode(' <span class="text-info">&#11161;</span> ', $formated_arrs);
                                        }
                                        else{
                                        $formated_date = format_date($date_val, 'jS F, Y');
                                        }
                                        echo  $formated_date;
                                        $remove_link = unset_get_value('rawat_inap_Tanggal_Masuk', $this->route->page_url);
                                        ?>
                                        <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                            &times;
                                        </a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if(!empty($_GET['rawat_inap_Tanggal_Keluar'])){
                                    ?>
                                    <div class="filter-chip card bg-light">
                                        <b>Rawat Inap Tanggal Keluar :</b> 
                                        <?php
                                        $date_val = get_value('rawat_inap_Tanggal_Keluar');
                                        $formated_date = "";
                                        if(str_contains('-to-', $date_val)){
                                        //if value is a range date
                                        $vals = explode('-to-' , str_replace(' ' , '' , $date_val));
                                        $startdate = $vals[0];
                                        $enddate = $vals[1];
                                        $formated_date = format_date($startdate, 'jS F, Y') . ' <span class="text-muted">&#10148;</span> ' . format_date($enddate, 'jS F, Y');
                                        }
                                        elseif(str_contains(',', $date_val)){
                                        //multi date values
                                        $vals = explode(',' , str_replace(' ' , '' , $date_val));
                                        $formated_arrs = array_map(function($date){return format_date($date, 'jS F, Y');}, $vals);
                                        $formated_date = implode(' <span class="text-info">&#11161;</span> ', $formated_arrs);
                                        }
                                        else{
                                        $formated_date = format_date($date_val, 'jS F, Y');
                                        }
                                        echo  $formated_date;
                                        $remove_link = unset_get_value('rawat_inap_Tanggal_Keluar', $this->route->page_url);
                                        ?>
                                        <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                            &times;
                                        </a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div  class=" animated fadeIn page-content">
                                    <div id="rawat_inap-list-records">
                                        <div id="page-report-body" class="table-responsive">
                                            <table class="table  table-striped table-sm text-left">
                                                <thead class="table-header bg-light">
                                                    <tr>
                                                        <th class="td-checkbox">
                                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                                <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                                <span class="custom-control-label"></span>
                                                            </label>
                                                        </th>
                                                        <th class="td-sno">#</th>
                                                        <th  class="td-id"> Id</th>
                                                        <th  class="td-No_RM"> No RM</th>
                                                        <th  class="td-No_SEP"> No SEP</th>
                                                        <th  class="td-Nama_Pasien"> Nama Pasien</th>
                                                        <th  class="td-Tanggal_Masuk"> Tanggal Masuk</th>
                                                        <th  class="td-Tanggal_Keluar"> Tanggal Keluar</th>
                                                        <th  class="td-Keterangan"> Keterangan</th>
                                                        <th class="td-btn"></th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                if(!empty($records)){
                                                ?>
                                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                                    <!--record-->
                                                    <?php
                                                    $counter = 0;
                                                    foreach($records as $data){
                                                    $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                                    $counter++;
                                                    ?>
                                                    <tr>
                                                        <th class=" td-checkbox">
                                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                                <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                                    <span class="custom-control-label"></span>
                                                                </label>
                                                            </th>
                                                            <th class="td-sno"><?php echo $counter; ?></th>
                                                            <td class="td-id"><a href="<?php print_link("rawat_inap/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
                                                            <td class="td-No_RM">
                                                                <span  data-value="<?php echo $data['No_RM']; ?>" 
                                                                    data-pk="<?php echo $data['id'] ?>" 
                                                                    data-url="<?php print_link("rawat_inap/editfield/" . urlencode($data['id'])); ?>" 
                                                                    data-name="No_RM" 
                                                                    data-title="Enter No Rm" 
                                                                    data-placement="left" 
                                                                    data-toggle="click" 
                                                                    data-type="number" 
                                                                    data-mode="popover" 
                                                                    data-showbuttons="left" 
                                                                    class="is-editable" >
                                                                    <?php echo $data['No_RM']; ?> 
                                                                </span>
                                                            </td>
                                                            <td class="td-No_SEP">
                                                                <span  data-value="<?php echo $data['No_SEP']; ?>" 
                                                                    data-pk="<?php echo $data['id'] ?>" 
                                                                    data-url="<?php print_link("rawat_inap/editfield/" . urlencode($data['id'])); ?>" 
                                                                    data-name="No_SEP" 
                                                                    data-title="Enter No Sep" 
                                                                    data-placement="left" 
                                                                    data-toggle="click" 
                                                                    data-type="text" 
                                                                    data-mode="popover" 
                                                                    data-showbuttons="left" 
                                                                    class="is-editable" >
                                                                    <?php echo $data['No_SEP']; ?> 
                                                                </span>
                                                            </td>
                                                            <td class="td-Nama_Pasien">
                                                                <span  data-value="<?php echo $data['Nama_Pasien']; ?>" 
                                                                    data-pk="<?php echo $data['id'] ?>" 
                                                                    data-url="<?php print_link("rawat_inap/editfield/" . urlencode($data['id'])); ?>" 
                                                                    data-name="Nama_Pasien" 
                                                                    data-title="Enter Nama Pasien" 
                                                                    data-placement="left" 
                                                                    data-toggle="click" 
                                                                    data-type="text" 
                                                                    data-mode="popover" 
                                                                    data-showbuttons="left" 
                                                                    class="is-editable" >
                                                                    <?php echo $data['Nama_Pasien']; ?> 
                                                                </span>
                                                            </td>
                                                            <td class="td-Tanggal_Masuk">
                                                                <span  data-flatpickr="{ enableTime: false, minDate: '<?php echo format_date('Y-m-d H:i:s'); ?>', maxDate: '<?php echo date_now(); ?>'}" 
                                                                    data-value="<?php echo $data['Tanggal_Masuk']; ?>" 
                                                                    data-pk="<?php echo $data['id'] ?>" 
                                                                    data-url="<?php print_link("rawat_inap/editfield/" . urlencode($data['id'])); ?>" 
                                                                    data-name="Tanggal_Masuk" 
                                                                    data-title="Enter Tanggal Masuk" 
                                                                    data-placement="left" 
                                                                    data-toggle="click" 
                                                                    data-type="flatdatetimepicker" 
                                                                    data-mode="popover" 
                                                                    data-showbuttons="left" 
                                                                    class="is-editable" >
                                                                    <?php echo $data['Tanggal_Masuk']; ?> 
                                                                </span>
                                                            </td>
                                                            <td class="td-Tanggal_Keluar">
                                                                <span  data-flatpickr="{ enableTime: false, minDate: '<?php echo format_date('Y-m-d H:i:s'); ?>', maxDate: '<?php echo date_now(); ?>'}" 
                                                                    data-value="<?php echo $data['Tanggal_Keluar']; ?>" 
                                                                    data-pk="<?php echo $data['id'] ?>" 
                                                                    data-url="<?php print_link("rawat_inap/editfield/" . urlencode($data['id'])); ?>" 
                                                                    data-name="Tanggal_Keluar" 
                                                                    data-title="Enter Tanggal Keluar" 
                                                                    data-placement="left" 
                                                                    data-toggle="click" 
                                                                    data-type="flatdatetimepicker" 
                                                                    data-mode="popover" 
                                                                    data-showbuttons="left" 
                                                                    class="is-editable" >
                                                                    <?php echo $data['Tanggal_Keluar']; ?> 
                                                                </span>
                                                            </td>
                                                            <td class="td-Keterangan">
                                                                <span  data-value="<?php echo $data['Keterangan']; ?>" 
                                                                    data-pk="<?php echo $data['id'] ?>" 
                                                                    data-url="<?php print_link("rawat_inap/editfield/" . urlencode($data['id'])); ?>" 
                                                                    data-name="Keterangan" 
                                                                    data-title="Enter Keterangan" 
                                                                    data-placement="left" 
                                                                    data-toggle="click" 
                                                                    data-type="text" 
                                                                    data-mode="popover" 
                                                                    data-showbuttons="left" 
                                                                    class="is-editable" >
                                                                    <?php echo $data['Keterangan']; ?> 
                                                                </span>
                                                            </td>
                                                            <th class="td-btn">
                                                                <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("rawat_inap/view/$rec_id"); ?>">
                                                                    <i class="fa fa-eye"></i> View
                                                                </a>
                                                                <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("rawat_inap/edit/$rec_id"); ?>">
                                                                    <i class="fa fa-edit"></i> Edit
                                                                </a>
                                                                <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("rawat_inap/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                                    <i class="fa fa-times"></i>
                                                                    Delete
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        <?php 
                                                        }
                                                        ?>
                                                        <!--endrecord-->
                                                    </tbody>
                                                    <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                                <?php 
                                                if(empty($records)){
                                                ?>
                                                <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                                    <i class="fa fa-ban"></i> No record found
                                                </h4>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            if( $show_footer && !empty($records)){
                                            ?>
                                            <div class=" border-top mt-2">
                                                <div class="row justify-content-center">    
                                                    <div class="col-md-auto justify-content-center">    
                                                        <div class="p-3 d-flex justify-content-between">    
                                                            <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("rawat_inap/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                                <i class="fa fa-times"></i> Delete Selected
                                                            </button>
                                                            <div class="dropup export-btn-holder mx-1">
                                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-save"></i> Download
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                        </a>
                                                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                            </a>
                                                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                                </a>
                                                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                                    </a>
                                                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">   
                                                                            <?php
                                                                            if($show_pagination == true){
                                                                            $pager = new Pagination($total_records, $record_count);
                                                                            $pager->route = $this->route;
                                                                            $pager->show_page_count = true;
                                                                            $pager->show_record_count = true;
                                                                            $pager->show_page_limit =true;
                                                                            $pager->limit_count = $this->limit_count;
                                                                            $pager->show_page_number_list = true;
                                                                            $pager->pager_link_range=5;
                                                                            $pager->render();
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
