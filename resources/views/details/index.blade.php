<style>
  .wrapper{width: 500px;
          height: 400px;
          display: flex;
          flex: 1;
          
  
  }

</style>
<div class="wrapper">
          @foreach($details as $detail)

      <div>
          <h3>
              <a href="{{ route('details.show', ['detail' => $detail['id']])}}">{{$detail['name']}}</a>
          </h3>
          <ul>
          <li>
              Type: {{$detail['type']}}
          </li>
          <li>
              Location: {{$detail['location']}}
          </li>
          <li>
            Year Established: {{$detail['year_created']}}
        </li>
      </ul>
</div>
@endforeach
</div>