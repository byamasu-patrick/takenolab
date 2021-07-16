                                
                                
<ul class="u-text u-text-5" style="list-style-type: none; margin-left: -10px; font-size: 12px;">
    @for($j = 0; $j < count($courses->topics[$i]->subtopics); $j++)
        <li>{{ $courses->topics[$i]->subtopics[$j]->subtopic_name }}</li>                        
    @endfor
</ul>