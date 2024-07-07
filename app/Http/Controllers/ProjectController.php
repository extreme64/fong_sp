<?php

namespace App\Http\Controllers;

use App\Managers\ProjectWeb;
use App\Models\ProjectMedia;
use Config;

use App\Models\Media;
use App\Models\Project;
use App\Models\UserProjectAttribute;
use App\Constants\ProjectAttributeKeys;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Managers\ProjectTypeFactory;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    private $projectTypeFactory;

    public function __construct(projectTypeFactory $projectTypeFactory)
    {
        $this->projectTypeFactory = $projectTypeFactory;
    }
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::select([ 
            'projects.id',
            'projects.title',
            'projects.video', 
            'projects.description',
            'projects.body',
            'projects.permalink',
            'media.full_name AS image_url'])
            ->join('media', 'projects.feature_id', '=', 'media.id')
            ->where('projects.status', 1)
            ->get();

        foreach ($projects as $project) {
            $project->icon = $this->getIconByType($project->type_id);
        }

        return view('projects.index', compact('projects'));
    }

    /**
     * Display the specified project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function show($project_id, $permalink)
    {
        // Project Info
        $project = Project::find($project_id);

        $descriptionItems = [];

        try {
            $descriptionItems = $this->projectTypeFactory
                ->getProjectType($project)
                ->generateProjectDescription($project);
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [$th]);
        }


        $mediaIds = $project->projectMedias()->pluck('media_id');
        $medias = Media::whereIn('id', $mediaIds)->get();

        $backgroungImageUrl = Media::select([
            'full_name AS url'])
            ->where('id',  $project->feature_id)
            ->get()
            ->first()->url;


        $gallery = $medias->toArray();

        $project_production_stage = match ($project->production_stage) {
            1 => "TBA",
            2 => "PROTOTYPE",
            3 => "BETA",
            4 => "GET HERE",
            default => "N/A"
        };

        // Other projects
        $projects = Project::select('id', 'title', 'description', 'type_id', 'permalink')
            ->where('status', '=', 1)
            ->get();

        return view('projects.show', compact('project', 'projects', 'project_production_stage', 'gallery', 'descriptionItems', 'backgroungImageUrl'));
    }


    /**
     * Add user project attributes
     *
     * @param Request $request
     * @param mixed $projectId
     * 
     * @return [type]
     */
    public function saveUserChoices(Request $request, $projectId)
    {
        $avatarChoice = $request->input('avatar');
        $backgroundChoice = $request->input('background');
        $terminalChoice = $request->input('terminal');
        $themeChoice = $request->input('theme');

        $userId = Auth::id();

        UserProjectAttribute::create([
            'user_id' => $userId,
            'project_id' => $projectId,
            'attribute_key' => ProjectAttributeKeys::AVATAR_KEY,
            'attribute_value' => $avatarChoice,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserProjectAttribute::create([
            'user_id' => $userId,
            'project_id' => $projectId,
            'attribute_key' => ProjectAttributeKeys::BACKGROUND_KEY,
            'attribute_value' => $backgroundChoice,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserProjectAttribute::create([
            'user_id' => $userId,
            'project_id' => $projectId,
            'attribute_key' => ProjectAttributeKeys::TERMINAL_KEY,
            'attribute_value' => $terminalChoice,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserProjectAttribute::create([
            'user_id' => $userId,
            'project_id' => $projectId,
            'attribute_key' => ProjectAttributeKeys::THEME_KEY,
            'attribute_value' => $themeChoice,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //TODO: Return a response or perform any other necessary actions.
    }

    /**
     * Get icon based of type.
     *
     * @param string $type
     * @return string
     */
    private function getIconByType($type)
    {
        switch ($type) {
            case Config::get('app_types.browser'):
                return '<svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 496 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z"></path></svg>';

            case Config::get('app_types.mobile'):
                return '<svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M16 64C16 28.7 44.7 0 80 0H304c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H80c-35.3 0-64-28.7-64-64V64zM224 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM304 64H80V384H304V64z"></path></svg>';

            case Config::get('app_types.plugin'):
                return '<svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M519.442 288.651c-41.519 0-59.5 31.593-82.058 31.593C377.409 320.244 432 144 432 144s-196.288 80-196.288-3.297c0-35.827 36.288-46.25 36.288-85.985C272 19.216 243.885 0 210.539 0c-34.654 0-66.366 18.891-66.366 56.346 0 41.364 31.711 59.277 31.711 81.75C175.885 207.719 0 166.758 0 166.758v333.237s178.635 41.047 178.635-28.662c0-22.473-40-40.107-40-81.471 0-37.456 29.25-56.346 63.577-56.346 33.673 0 61.788 19.216 61.788 54.717 0 39.735-36.288 50.158-36.288 85.985 0 60.803 129.675 25.73 181.23 25.73 0 0-34.725-120.101 25.827-120.101 35.962 0 46.423 36.152 86.308 36.152C556.712 416 576 387.99 576 354.443c0-34.199-18.962-65.792-56.558-65.792z"></path></svg>';

            case Config::get('app_types.desktop'):
                return '<svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V352H64V64H512z"/></svg>';

            case Config::get('app_types.other'):
                return '<svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M290.8 48.6l78.4 29.7L288 109.5 206.8 78.3l78.4-29.7c1.8-.7 3.8-.7 5.7 0zM136 92.5V204.7c-1.3 .4-2.6 .8-3.9 1.3l-96 36.4C14.4 250.6 0 271.5 0 294.7V413.9c0 22.2 13.1 42.3 33.5 51.3l96 42.2c14.4 6.3 30.7 6.3 45.1 0L288 457.5l113.5 49.9c14.4 6.3 30.7 6.3 45.1 0l96-42.2c20.3-8.9 33.5-29.1 33.5-51.3V294.7c0-23.3-14.4-44.1-36.1-52.4l-96-36.4c-1.3-.5-2.6-.9-3.9-1.3V92.5c0-23.3-14.4-44.1-36.1-52.4l-96-36.4c-12.8-4.8-26.9-4.8-39.7 0l-96 36.4C150.4 48.4 136 69.3 136 92.5zM392 210.6l-82.4 31.2V152.6L392 121v89.6zM154.8 250.9l78.4 29.7L152 311.7 70.8 280.6l78.4-29.7c1.8-.7 3.8-.7 5.7 0zm18.8 204.4V354.8L256 323.2v95.9l-82.4 36.2zM421.2 250.9c1.8-.7 3.8-.7 5.7 0l78.4 29.7L424 311.7l-81.2-31.1 78.4-29.7zM523.2 421.2l-77.6 34.1V354.8L528 323.2v90.7c0 3.2-1.9 6-4.8 7.3z"/></svg>';

            default:
                return '';
        }
    }

}