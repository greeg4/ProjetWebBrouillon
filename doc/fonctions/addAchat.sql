
create or replace function addAchat(integer, integer)
RETURNS integer as
'
    declare fclient alias for $1;
    declare fDVD alias for $2;
    declare id integer;
    declare idc integer;
    declare retour integer;
    begin
	select into idc idCl from Client where idCl=fclient;
	if not found then
	    retour=2;
	else
	    insert into achat(idCl, idDVD, dateachat) values (fclient, fDVD, current_date);
	    select into id idachat from achat where idClt=fclient and
						  idDVD=fDVD and
						  dateachat=current_date;
	    if not found then
		retour=0;
	    else
	        retour=1;
	    end if;
    end if;
    return retour;
end;
'
language plpgsql;