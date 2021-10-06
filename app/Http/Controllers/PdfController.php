<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
class PdfController extends Controller
{

    public function convertIntoPdf(Student $student)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convertHtml($student));
        return $pdf->stream();
    }

    function convertHtml($student)
    {
       // $customer_data = ($student->attendances);
        $output = '

     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Student Id</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Attendance Date</th>
   </tr>
     ';

       // dd( $student->first_name );
        foreach($student->attendances as $report)
        {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$student->first_name.' </td>
       <td style="border: 1px solid; padding:12px;">'.$student->first_name.'_'.$student->last_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$report->attendance_date.'</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }
}
