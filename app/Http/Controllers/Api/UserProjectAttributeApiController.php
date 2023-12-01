<?php

namespace App\Http\Controllers\Api;

use App\Models\Award;
use Illuminate\Http\Request;
use App\Contracts\ApiResultHandler;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\UserProjectAttribute;
use Illuminate\Support\Facades\Auth;

class UserProjectAttributeApiController extends Controller
{
    public function store(Request $request, $project)
    {
        $messages = [];
        $code = null;
        $data = $request->all();

        $validAwardIds = Award::pluck('id')->toArray();
        $user_id = Auth::user()->id;

        foreach ($data as $attributeKey => $attributeValue) {
            $userAttribute = UserProjectAttribute::where('user_id', $user_id)
                ->where('project_id', $project)
                ->where('attribute_key', $attributeKey)
                ->whereIn('attribute_value', $validAwardIds)
                ->first();

            if (!$userAttribute) {
                $userAttribute = new UserProjectAttribute();
                $userAttribute->user_id = $user_id;
                $userAttribute->project_id = $project;
                $userAttribute->attribute_key = $attributeKey;
            }

            $userAttribute->attribute_value = $attributeValue;

            $status = $userAttribute->save();

            if (!$status) {
                $errorText = "User attribute ['${attributeKey}': ${attributeValue}], " . ($userAttribute->wasRecentlyCreated ? 'INSERT' : 'UPDATE') . " fail!";
                $this->handleQueryError($messages, $code, $errorText);
            }
        }

        if (empty($messages)) {
            $messages[] = 'Attributes saved successfully';
            $code = ApiResultHandler::SUCCESS;
        }

        return response()->json(['message' => $messages], $code);
    }

    public function index(Request $request, $project)
    {
        $user_id = Auth::user()->id;

        if (!isset($project)) {
            return response()->json(['message' => 'No data retrieved. No project ID set'], ApiResultHandler::INTERNAL_SERVER_ERROR);
        }

        $projectAttributes = UserProjectAttribute::where('project_id', $project)
            ->where('user_id', $user_id)
            ->select('attribute_key', 'attribute_value')
            ->get();

        if ($projectAttributes->isEmpty()) {
            return response()->json(['message' => 'No data retrieved. No project ID set'], ApiResultHandler::NOT_FOUND);
        }

        $awardUrls = [];
        $keys = ['avatar_id', 'terminal_id', 'background_id'];
        foreach ($projectAttributes as $item) {
            $tmpKey = $item['attribute_key'];
            if (in_array($tmpKey, $keys)) {
                $awardUrls[$item['attribute_key']] = asset('storage/images/' . Award::find((int) $item['attribute_value'])->full_name);
            }
        }

        return response()->json(['message' => $projectAttributes, 'urls' => $awardUrls], ApiResultHandler::SUCCESS);
    }

    public function update(Request $request, $project, $attribute)
    {

        $messages = [];
        $code = null;
        $data = $request->all();

        $validAwardIds = Award::pluck('id')->toArray();
        $userAttribute = UserProjectAttribute::where('user_id', Auth::user()->id)
            ->where('project_id', $project)
            ->where('attribute_key', $attribute)
            ->whereIn('attribute_value', $validAwardIds)
            ->first();

        if (!$userAttribute) {
            // Attribute not found, handle as per your requirements (e.g., return an error response)
            $messages[] = 'Attribute not found';
            $code = ApiResultHandler::NOT_FOUND;
            return response()->json(['message' => $messages], $code);
        }

        $userAttribute->attribute_value = $data[$attribute];

        $status = $userAttribute->save();

        if (!$status) {
            $errorText = "User attribute ['${attribute}': ${data[$attribute]}], UPDATE fail!";
            $this->handleQueryError($messages, $code, $errorText);
        }

        if (empty($messages)) {
            $messages[] = 'Attribute updated successfully';
            $code = ApiResultHandler::SUCCESS;
        }

        return response()->json(['message' => $messages], $code);
    }

    public function show(Request $request, $project, $attribute)
    {
        // Retrieve and return the specific attribute for the specified project
        return response()->json(['attrName' => 'Value']);
    }

    private function handleQueryError(&$messages, &$code, $errorText): void
    {
        Log::debug('ERROR:', [$errorText]);

        $code = ApiResultHandler::DB_QUERY_ERROR;
        $messages[] = "ERROR: ${errorText}";
    }
}
