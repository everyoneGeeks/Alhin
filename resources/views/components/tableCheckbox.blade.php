
<tr>
        <th>{{$title}}</th>
        <th><input type="checkbox" 
             form="formAdmin" style="text-align: center;" 
             {{$permissions->$name->add == NULL ? :'checked'}}  name="add{{$name}}" value='1' > </th>
        <th><input type="checkbox" form="formAdmin" style="text-align: center;" 
            {{$permissions->$name->edit == NULL ? :'checked'}}  name="edit{{$name}}" value='1' > </th>
        <th><input type="checkbox" form="formAdmin"
             style="text-align: center;"  {{$permissions->$name->delete == NULL ? :'checked'}} value='1' name="delete{{$name}}" > </th>
        </tr>
        