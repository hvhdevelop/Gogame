<?php
namespace App\Http\ViewComposer;
use Illuminate\View\View;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class MenuComposer {
    public function compose( View $view ){
        $types    = Type::all();
        $user = Auth::user();
        
        
        $view->with('types',$types);
        $view->with('cr_user',$user);
    }
}