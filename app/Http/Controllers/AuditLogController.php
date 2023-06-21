<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function listAuditLog(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'id',
            'user',
            'action',
            'table',
            'nID',
            'ip_address',
            'created_at',
        );

        // if ($request->isDashboardTB == 1) {
        //   $tableColumns = array(
        //     'first_name',
        //     'first_name',
        //     'last_name',
        //     'user_level_id',
        //   );
        // }

        // offset and limit
        $offset = 0;
        $limit = 10;
        if (isset($request->length)) {
            $offset = isset($request->start) ? $request->start : $offset;
            $limit = isset($request->length) ? $request->length : $limit;
        }

        // searchText
        $search = '';
        if (isset($request->search) && isset($request->search['value'])) {
            $search = $request->search['value'];
        }

        // ordering
        $sortIndex = 0;
        $sortOrder = 'desc';
        if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['column'])) {
            $sortIndex = $request->order[0]['column'];
        }
        if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['dir'])) {
            $sortOrder = $request->order[0]['dir'];
        }

        $auditLogs = AuditLog::where('deleted', '0');
        $auditLogs = $auditLogs->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
            ->orWhere('user', 'like', '%' . $search . '%')
            ->orWhere('action', 'like', '%' . $search . '%')
            ->orWhere('table', 'like', '%' . $search . '%')
            ->orWhere('nID', 'like', '%' . $search . '%')
            ->orWhere('created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $auditLogsCount = $auditLogs->count();
        $auditLogs = $auditLogs->offset($offset)
            ->limit($limit)
            ->get();


        $result = [
            'recordsTotal'    => $auditLogsCount,
            'recordsFiltered' => $auditLogsCount,
            'data'            => $auditLogs,
        ];

        // reponse must be in  array
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function deleteAuditLog(Request $request)
    {
        $deleteAuditLog = AuditLog::where('id', $request->id)->first();

        if ($deleteAuditLog) {


            $deleteAuditLog->deleted = 1;
            $deleteAuditLog->save();
            return 'Audit Log deleted successfully.';
        } else {

            return 'Audit Log deleted unsuccessfully.';
        }
    }
}
