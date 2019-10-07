<?php 
	/**
	 * summary
	 */
	class thongtin
	{
		var $stt;
		var $formyear;
		var $toyear;
		var $class;
		var $noihoc;
	    /**
	     * summary
	     */
	     function __construct( $stt,$formyear,$toyear,$class,$noihoc)
	    {
	        $this->stt=$stt;
	        $this->formyear=$formyear;
	        $this->toyear=$toyear;
	        $this->class=$class;
	        $this->noihoc=$noihoc;
	    }
	    function display(){ ?>
	    	<tr class="content">
				<td><?php echo $this->stt; ?></td>
				<td><?php echo $this->formyear; ?></td>
				<td><?php echo $this->toyear; ?></td>
				<td><?php echo $this->class; ?></td>
				<td><?php echo $this->noihoc; ?></td>
				<td>
					<button type="button"><i class="far fa-edit"></i>&ensp;Sửa</button>
					<button type="button"><i class="far fa-trash-alt"></i>&ensp;Xóa</button>
				</td>
			</tr>
	    	
	    <?php }
	   
	}
 ?>