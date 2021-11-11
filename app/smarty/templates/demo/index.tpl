<div class="card mb-4">
    <form action="search-item" method="POST" >
        <input class="form-control py-4" id="search_test" name="search_test" type="text" />
        <div class="" id="search_result"> <br><input class="" type="submit" value="Search" />
        </div>

    </form>
</div>
<pre>
{* {html_table loop=$list_data[1] cols=4 } *}
</pre>
{foreach from=$list_data key=k item =i}
    <ul>
        <li> {$i[1]}</li>
        <li> {$i[2]}</li>
        <li> {$i[3]}</li>
        <li> <a href="student-detail/{$i[0]}"> detail </a></li>
    </ul>
{/foreach}

{include file="share/footer.tpl"}

<script src="public/js/demo.js"></script>