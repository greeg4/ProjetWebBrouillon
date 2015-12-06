create or replace function addReal (text) returns integer
as
'
  declare fnomReal alias for $1;
  declare retour integer;
  declare id integer;
begin
 	insert into developpeur(nomReal) 
	values (fnomReal);
        select into id idReal from réalisateur where nomreal=fnomReal;

        if not found	then
		retour=0;
	else 
		retour=1;
	end if;
        return retour;
end;
'
language 'plpgsql';
