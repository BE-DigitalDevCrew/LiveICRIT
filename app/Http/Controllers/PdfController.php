<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use App\Models\DailyEntry;

class PdfController extends Controller
{
    public function showGeneratePDF(Request $request, $entryId)
    {
        $entry = DailyEntry::leftJoin('patients', 'daily_entries.patient_id', '=', 'patients.id')
        ->leftJoin('users', 'daily_entries.user_id', '=', 'users.id')
        ->where('daily_entries.id', $entryId)
        ->select('users.username as user_name', 'users.house as house', 'patients.patient_name', 'daily_entries.date', 'daily_entries.personal_care', 'daily_entries.shift', 'daily_entries.medication_admin', 'daily_entries.activities', 'daily_entries.incident', 'daily_entries.appointments')
        ->first();
        if (!$entry) {
        // Handle case when entry is not found
        abort(404, 'Entry not found');
        }
    // Generate a PDF using $entry data
    
        $pdf = new \Dompdf\Dompdf();
        $html = view('pdf.entry', compact('entry'))->render();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('entry_' . $entry->id . '.pdf');

    }
}
