<?php

namespace App\Http\Controllers\Api;

use App\Models\Award;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Contracts\ApiResultHandler;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\UserProjectAttribute;
use Illuminate\Support\Facades\Auth;

class ProjectApiController extends Controller implements ApiResultHandler
{

    public function createProject(Request $request)
    {
        $user = auth()->user();

        $project = new Project();

        $project->title = ($request->title) ?? '';
        $project->body = ($request->mainContent) ?? '';
        $project->description = ($request->description) ?? '';
        $project->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));
        $project->production_stage = 1; // $request->productionStage;
        $project->status = (int)$request->isPublic;
        $project->created_at = now();
        $project->updated_at = now();
        $status = $project->save();

    
        $payload = [
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    public function updateProject(Request $request, $id)
    {
        $user = auth()->user();

        $project = Project::find($id);

        $project->title = ($request->title) ?? '';
        $project->body = ($request->mainContent) ?? '';
        $project->description = ($request->description) ?? '';
        $project->permalink = ($request->permalink) ?? preg_replace('/\s+/', '-', strtolower(trim($request->title)));
        $project->production_stage = 1; // $request->productionStage;
        $project->status = (int)$request->isPublic;
        $project->created_at = now();
        $project->updated_at = now();
        $status = $project->save();


        $payload = [
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }

    
    public function deleteProject(Request $request, $id)
    {
        $user = auth()->user();

        $project = Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], ApiResultHandler::NOT_FOUND );
        }
        $status = $project->delete();


        $payload = [
            'status' => $status
        ];

        return response()->json(['message' => $payload], ApiResultHandler::SUCCESS );
    }
    /**
     * [Description for saveAttributes]
     *
     * @param Request $request
     * @param mixed $project_id
     * 
     * @return [type]
     * 
     */
    public function saveAttributes(Request $request, $project_id)
    {
        if(!isset($project_id)){
            return response()->json(['message' => 'Not saved. No project ID set']);
        }
        
        $messages = [];
        $code = NULL;
        $userAttribute = $attributeKey = '';

        $data = $request->all();
        
        $validAwardIds = Award::pluck('id')->toArray();

        $user_id = Auth::user()->id;

        foreach ($data as $attributeKey => $attributeValue) {
            $this->saveToDatabase($user_id, $project_id, $attributeKey, $attributeValue, $validAwardIds, $messages, $code);
        }

        if(empty($messages)){
            $messages[] = 'Attributes saved successfully';
            $code = ApiResultHandler::SUCCESS;
        }

        return response()->json(['message' => $messages], $code);
    }

    /**
     * [Description for getAttributes]
     *
     * @param Request $request
     * @param mixed $project_id
     * 
     * @return [type]
     * 
     */
    public function getAttributes(Request $request, $project_id)
    {

        $user_id = Auth::user()->id;

        if(!isset($project_id)){
            return response()->json(['message' => 'No data retrieved. No project ID set'], ApiResultHandler::INTERNAL_SERVER_ERROR);
        }

        $projectAttributes = UserProjectAttribute::where('project_id', $project_id)
            ->where('user_id', $user_id)
            ->select('attribute_key', 'attribute_value')
            ->get();

        if($projectAttributes->isEmpty()) {
            return response()->json(['message' => 'No data retrieved. No project ID set'], ApiResultHandler::NOT_FOUND);
        }

        $awardUrls = [];
        $keys = ['avatar_id', 'terminal_id', 'background_id'];
        foreach ($projectAttributes as $item) {
            $tmpKey = $item['attribute_key'];
            if( in_array($tmpKey, $keys) ) {
                $awardUrls[$item['attribute_key']] = asset('storage/images/' . Award::find((int)$item['attribute_value'])->full_name);
            }
        }

        return response()->json(['message' => $projectAttributes, 'urls' => $awardUrls], ApiResultHandler::SUCCESS);
    }

    /**
     * [Description for saveAttribute]
     *
     * @param Request $request
     * @param mixed $project_id
     * @param mixed $attribute
     * 
     * @return [type]
     * 
     */
    public function saveAttribute(Request $request, $project_id, $attribute)
    {
        $messages = [];
        $code = NULL;
        $userAttribute = $attributeKey = '';

        $data = $request->all();

        $validAwardIds = Award::pluck('id')->toArray();
        
        $this->saveToDatabase(Auth::user()->id, $project_id, $attributeKey, $attributeValue, $validAwardIds, $messages, $code);

        if(empty($messages)){
            $messages[] = 'Attributes saved successfully';
            $code = ApiResultHandler::SUCCESS;
        }

        return response()->json(['message' => $messages], $code);
    }

    public function getAttribute(Request $request, $project_id, $attribute)
    {
        // Retrieve and return the specific attribute for the specified project
        // Implement your logic to fetch the attribute from the store or database
        // Return it as a JSON response
        return response()->json(['attrName' => 'Value']);
    }

    /**
     * [Description for handleQueryError]
     *
     * @param mixed $messages
     * @param mixed $code
     * @param mixed $errorText
     * 
     * @return void
     * 
     */
    public function handleQueryError(&$messages, &$code, $errorText): void
    {
        Log::debug('ERROR:', [$errorText]);

        $code = ApiResultHandler::DB_QUERY_ERROR;
        $messages[] = "ERROR: ${errorText}";
    }

    /**
     * [Description for saveToDatabase]
     *
     * @param mixed $user_id
     * @param mixed $project_id
     * @param mixed $attributeKey
     * @param mixed $attributeValue
     * @param mixed $messages
     * @param mixed $code
     * 
     * @return [type]
     * 
     */
    private function saveToDatabase($user_id, $project_id, $attributeKey, $attributeValue, $validAwardIds, &$messages, &$code)
    {
        $userAttribute = UserProjectAttribute::where('user_id', $user_id)
            ->where('project_id', $project_id)
            ->where('attribute_key', $attributeKey)
            ->whereIn('attribute_value', $validAwardIds)
            ->first();

        if ($userAttribute) {
            $userAttribute->attribute_value = $attributeValue;
        } else {
            $newUserAttribute = new UserProjectAttribute();
            $newUserAttribute->user_id = $user_id;
            $newUserAttribute->project_id = $project_id;
            $newUserAttribute->attribute_key = $attributeKey;
            $newUserAttribute->attribute_value = $attributeValue;
            $userAttribute = $newUserAttribute;
        }

        $status = $userAttribute->save();

        if (!$status) {
            $errorText = "User attribute ['${attributeKey}': ${attributeValue}], " . ($userAttribute->wasRecentlyCreated ? 'INSERT' : 'UPDATE') . " fail!";
            $this->handleQueryError($messages, $code, $errorText);
        }
    }





    
}