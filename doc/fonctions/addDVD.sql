create or replace function addDVD(text, real)
returns integer as
'
    declare ftitre alias for $1;
    declare fprix alias for $2;    
    declare retour integer;
    declare id integer;
BEGIN
    insert into DVD(titre, prix) values (ftitre, fprix);
    select into id idDVD from DVD where titre=ftitre and prix=fprix;
    if not found then
	retour=0;
    else
	retour=1;
    end if;
    return retour;
end;
'
  Language plpgsql
