create or replace function addContact (text,text,text,text,text) returns integer
as
'
  declare fsexe alias for $1;
  declare fnom alias for $2;
  declare fpre alias for $3;
  declare fcomm alias for $4;
  declare femail alias for $5;
  declare retour integer;
  declare id integer;
begin
 	insert into contact(sexe,nom,prenom,comm,email) 
	values (fsexe,fnom,fpre,fcomm,femail);
        select into id idcontact from contact where sexe=fsexe and nom=fnom 
        and prenom=fpre and comm=fcomm and email=femail;
        if not found	then
		retour=0;
	else 
		retour=1;
	end if;
        return retour;
end;
'
language 'plpgsql';