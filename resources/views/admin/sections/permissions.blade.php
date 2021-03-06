@extends('admin.layouts.template')

@section('title', 'Manage Roles')

@section('content')
    
@include('admin.partials.errors')


    {{-- Content --}}
    <section class="border block lg:w-[86%] w-3/4 bg-[#E6E6E6] px-5">
        <h2 class="text-[#3c4045] font-bold text-3xl mt-5 ">Administrador de Permisos</h2>
        <div
          class="border-[#3c4045] border flex items-center rounded-md justify-between flex-wrap gap-6 bg-white mt-8 px-5 py-5 pb-60  mb-5">
          <div class="relative w-full overflow-x-auto sm:rounded-lg">
            <table class="w-full  text-left text-[#3c4045]  ">
              <thead class=" text-gray-700   border-b-2 border-[#3c4045] ">
                <tr class="w-full">
                  <th scope="col" class="px-6 py-3">
                    Secciones
                  </th>
                  <th scope="col" class="px-6 py-3 text-left  ">
                    Administrador
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Empleado
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Agente
                  </th>
                </tr>
              </thead>
              <tbody id="checkboxContainer" class="text-[#343a40] ">
                {{-- Menu --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Menú
                  </th>

                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="1" name="1" type="checkbox" @roleCan('admin',1) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="1" name="2" type="checkbox" @roleCan('employ', 1) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="1" name="3" type="checkbox" @roleCan('broker', 1) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- Rent --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Alquiler
                  </th>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="2" name="1" type="checkbox" @roleCan('admin',2) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="2" name="2" type="checkbox" @roleCan('employ',2) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="2" name="3" type="checkbox"  @roleCan('broker',2) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- Sale --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Venta
                  </th>

                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="3" name="1" type="checkbox" @roleCan('admin',3) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center"> 
                      <input id="3" name="2" type="checkbox" @roleCan('employ',3) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="3" name="3" type="checkbox" @roleCan('broker',3) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- Toys --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Toys
                  </th>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="4" name="1" type="checkbox"  @roleCan('admin',4) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="4" name="2" type="checkbox"  @roleCan('employ',4) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="4" name="3" type="checkbox"  @roleCan('broker',4) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- Events --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Eventos
                  </th>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="5" name="1" type="checkbox"  @roleCan('admin',5) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="5" name="2" type="checkbox" @roleCan('employ',5) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="5" name="3" type="checkbox"@roleCan('broker',5) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- News  --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Noticias
                  </th>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="6" name="1" type="checkbox" @roleCan('admin',6) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="6" name="2" type="checkbox" @roleCan('employ',6) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="6" name="3" type="checkbox" @roleCan('broker',6) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- Contact --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Contacto
                  </th>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="7" name="1" type="checkbox" @roleCan('admin',7) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="7" name="2" type="checkbox" @roleCan('employ',7) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="7" name="3" type="checkbox" @roleCan('broker',7) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- Users --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Usuario
                  </th>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="8" name="1" type="checkbox" @roleCan('admin',8) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="8" name="2" type="checkbox" @roleCan('employ',8) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="8" name="3" type="checkbox" @roleCan('broker',8) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- Roles --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Roles
                  </th>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="9" name="1" type="checkbox" @roleCan('admin',9) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="9" name="2" type="checkbox" @roleCan('employ',9) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="9" name="3" type="checkbox" @roleCan('broker',9) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- Permissions --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Permisos
                  </th>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="10" name="1" type="checkbox" @roleCan('admin',10) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="10" name="2" type="checkbox" @roleCan('employ',10) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="10" name="3" type="checkbox" @roleCan('broker',10) checked @endroleCan
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
                {{-- Profile --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                    <th class="px-6 py-4 font-normal">
                        Profile
                    </th>
                    <td class=" py-4 px-6 ">
                        <div class="flex items-center">
                        <input id="12" name="1" type="checkbox" @roleCan('admin',12) checked @endroleCan
                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                        <label for="checkbox-table-2" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td class=" py-4 px-6 ">
                        <div class="flex items-center">
                        <input id="12" name="2" type="checkbox" @roleCan('employ',12) checked @endroleCan
                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                        <label for="checkbox-table-2" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td class=" py-4 px-6 ">
                        <div class="flex items-center">
                        <input id="12" name="3" type="checkbox" @roleCan('broker',12) checked @endroleCan
                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                        <label for="checkbox-table-2" class="sr-only">checkbox</label>
                        </div>
                    </td>
                </tr>

                {{-- All --}}
                <tr class="bg-white border-b hover:bg-gray-50 ">
                  <th class="px-6 py-4 font-normal">
                    Todos
                  </th>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="all" name="1" type="checkbox" value="admin" title="All Admin permissions" data-all-permissions="admin"
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="all" name="2" type="checkbox" value="employ" title="All Employ permissions" data-all-permissions="employ"
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class=" py-4 px-6 ">
                    <div class="flex items-center">
                      <input id="all" name="3" type="checkbox" value="brocker" title="All Broker Permissions" title="All Admin permissions" data-all-permissions="broker"
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded">
                      <label for="checkbox-table-2" class="sr-only">checkbox</label>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <form action="">
              <div class="flex justify-center mb-6 mt-14">
                <button
                  class="bg-[#037bff] border border-transparent text-white py-1 px-20 rounded-md hover:text-[#037bff] hover:border-[#037bff] hover:bg-white hover:border transition-all ease-out duration-300 ">
                  Actualizar Roles
                </button>
              </div>
            </form>
          </div>
  
        </div>
  
      </section>
    {{-- End Content --}}

@endsection

@section('js')
<script src="{{asset('vendor/axios.min.js')}}"></script>

<script>
    const Route = "{{ route('admin.permission.setByAjax') }}";
    const DataContainer = document.getElementById('checkboxContainer');

    DataContainer.addEventListener('click', handleCheckbox);

    function handleCheckbox(e){

        if(!e.target.getAttribute('type') || e.target.getAttribute('type') != 'checkbox') return null;
        
        setPermissionByAjax(Route, getCheckBox(e.target))
    }

    function getCheckBox(Input){
        return {
            role: Input.name ,
            permission: Input.id,
            isChecked: Input.checked
        }
    }

    function setPermissionByAjax(Route, PostValue){
        axios.post(Route, {
            'X-CSRF-TOKEN' : '{{ csrf_token() }}',
            data: JSON.stringify(PostValue),
        })
        .then(function(response){
            console.log(response)
        })
        .catch(function(error){
            alert(error);
        });
    }

    function hasAllPermissions(roleName, permissions = []){
          const permissionsCount = 11;
          const roles = {'admin':1,'employ':2,'broker':3};
          const permissionsQuantity = document.querySelectorAll('[name="'+roles[roleName]+'"]:checked').length;

          if(permissionsQuantity >= permissionsCount){
              document.querySelector('[data-all-permissions="'+roleName+'"]').checked = true;
          }
    }

    hasAllPermissions('admin');
    hasAllPermissions('employ');
    hasAllPermissions('broker');
</script>
    
@endsection
