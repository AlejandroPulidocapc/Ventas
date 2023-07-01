import { Component, ElementRef, Renderer2, ViewChild } from '@angular/core';
import { UserService } from '../users/user.service';
import { FormBuilder} from '@angular/forms';
@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent {
  
  @ViewChild("exampleModal") myButton:ElementRef | undefined;



public ListUser:any []=[]

public form= this.fb.group({

  id: "",
username:"",
password:"",
email:"",
titulo:""

})


public constructor(private userService:UserService, private fb:FormBuilder, private renderer: Renderer2){}

  getListUser()
{
  this.userService.userFindAll().subscribe((resp:any)=>{
    console.log(resp);

    this.ListUser = resp.response;
  })


}

save()

{
 if(this.form.get("id")?.value)
 {
  console.log("actualice");

this.form.get("titulo")?.setValue("actualizarUser");
this.userService.userUpdate(this.form.value).subscribe(()=>{
  console.log("ya actualizado");
  this.form.reset();
  this.cerrar();
  this.getListUser();
});



 }else{

  
    this.form.get ("titulo")?.setValue("usercrear");
   
   this.userService.userSave(this.form.value).subscribe(()=> {
   this.getListUser();
   this.form.reset();
   
   
   })
   
   
   

 }
}

editar(item:any)

{

this.form.reset({...item,} , {emitEvent:false,onlySelf:true});

this.openModal();
  console.log(item);
}
openModal()
  {
    this.renderer.addClass(this.myButton?.nativeElement , "show");
    this.renderer.addClass(this.myButton?.nativeElement , "mostrar");
  }

  cerrar()
  {
    this.renderer.removeClass(this.myButton?.nativeElement , "show")
   
    this.renderer.removeClass(this.myButton?.nativeElement , "mostrar")
  this.form.reset();
  }

delete(item:any)
{


this.userService.userDelete(item.id).subscribe(() => {
  this.getListUser();
})
}

}






