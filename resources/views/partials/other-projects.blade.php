<section class="bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
	<div class="container p-4 mx-auto my-6 space-y-1 text-center">
		<span class="text-xs font-semibold tracking-wider uppercase text-blue-600 dark:text-blue-400">Explore</span>
		<h2 class="pb-3 text-3xl font-bold md:text-4xl">Other Projects</h2>
		<p>Give it a minute, some might just grow on you.</p>
	</div>
	<div class="container grid justify-center gap-4 mx-auto lg:grid-cols-2 xl:grid-cols-4">
		
    @foreach ($projects as $project)
        <div class="flex flex-col px-8 py-6">
			<h2 class="mb-2 text-lg font-semibold sm:text-xl title-font text-gray-800 dark:text-gray-100">{{ $project->title }} {!! $project->icon !!}</h2>
			
            <p class="flex-1 mb-4 text-base leading-relaxed text-gray-600 dark:text-gray-400">
                {{ $project->description }}</p>
			
            <a class="inline-flex items-center space-x-2 text-sm text-blue-600 dark:text-blue-400" 
                href="{{ route('projects.show', ['project_id' => $project->id, 'permalink' => $project->permalink]) }}">
				<span>Learn More</span>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
					<path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
				</svg>
			</a>
		</div>
    @endforeach
    
	</div>
</section>