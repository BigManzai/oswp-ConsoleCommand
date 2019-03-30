<?php
/**
 * WordPress Widget oswp-consolecommand
 *
 * 
 *
 * @package   Widget_oswp-consolecommand
 * @author    Manfred Aabye <openmanniland@gmx.de>
 * @license   GPL-2.0+
 * @link      http://openmanniland.de
 * @copyright 2016-2019 Manfred Aabye
 *
 * @wordpress-plugin
 * Plugin Name:       oswp-consolecommand
 * Plugin URI:        https://github.com/BigManzai/oswp-consolecommand
 * Description:       Einstellungen für den OpenSimulator. ACHTUNG! Dies ist nur ein Test ohne weitere Funktion.
 * Version:           1.0.6
 * Author:            Manfred Aabye
 * Author URI:        http://openmanniland.de
 * Text Domain:       oswp-consolecommand
 * License:           GPL-2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 * GitHub Plugin URI: https://github.com/BigManzai/oswp-consolecommand
 */
// create oswp plugin settings menu
add_action('admin_menu', 'oswp_plugin_create_menu');

function oswp_plugin_create_menu() {

	//create new top-level menu
	add_menu_page('oswp Plugin Settings', 'OS Commands', 'administrator', __FILE__, 'oswp_plugin_settings_page' , plugins_url('/images/oswp20.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_oswp_plugin_settings' );
}


function register_oswp_plugin_settings() {
	//register our settings
	register_setting( 'oswp-plugin-settings-group', 'oswp_BaseURL' );
	register_setting( 'oswp-plugin-settings-group', 'oswp_ConsolePass' );
	register_setting( 'oswp-plugin-settings-group', 'oswp_ConsolePort' );
	
}

function oswp_plugin_settings_page() { ?>

<!-- 
	OpenSim Console Commands V1.06 by Manfred Aabye
 -->
<title>OS Console</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="w3-theme-l4">

	
<div style="min-width:400px">

<!-- Kopfzeile -->
	<div class="w3-bar w3-third w3-large w3-theme-d4" onclick="w3_open()"><a href="#" class="w3-bar-item"></a></button>
	<span class="w3-bar-item">OpenSimulator Console Commands</span>
	</div>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-card w3-half w3-sand " style="right:0">

<ul class="w3-ul w3-sand">
<b><li>	alert message - Send an alert to everyone	</li>
<li>	alert-user firstname lastname message - Send an alert to a user	</li>
<li>	appearance find uuid-or-start-of-uuid - Find out which avatar uses the given asset as a baked texture, if any.	</li>
<li>	appearance rebake first-name last-name - Send a request to the user's viewer for it to rebake and reupload its appearance textures.	</li>
<li>	appearance send first-name last-name - Send appearance data for each avatar in the simulator to other viewers.	</li>
<li>	appearance show first-name last-name - Show appearance information for avatars.	</li>
<li>	attachments show first-name last-name - Show attachment information for avatars in this simulator.	</li>
<li>	backup - Persist currently unsaved object changes immediately instead of waiting for the normal persistence call.	</li>
<li>	bypass permissions true / false - Bypass permission checks	</li>
<li>	change region region name - Change current console region	</li>
<li>	clear image queues first-name last-name - Clear the image queues (textures downloaded via UDP) for a particular client.	</li>
<li>	command-script script - Run a command script from file	</li>
<li>	config get section key - Synonym for config show	</li>
<li>	config save path - Save current configuration to a file at the given path	</li>
<li>	config set section key value - Set a config option.  In most cases this is not useful since changed parameters are not dynamically reloaded.  Neither do changed parameters persist - you will have to change a config file manually and restart.	</li>
<li>	config show section key - Show config information	</li>
<li>	create region "region name" region_file.ini - Create a new region.	</li>
<li>	debug attachments log 0|1 - Turn on attachments debug logging	</li>
<li>	debug attachments status - Show current attachments debug status	</li>
<li>	debug eq 0|1|2 - Turn on event queue debugging = 0 - turns off all event queue logging = 1 - turns on event queue setup and outgoing event logging = 2 - turns on poll notification	</li>
<li>	debug groups messaging verbose true|false - This setting turns on very verbose groups messaging debugging	</li>
<li>	debug groups verbose true|false - This setting turns on very verbose groups debugging	</li>
<li>	debug http in|out|all level - Turn on http request logging.	</li>
<li>	debug jobengine start|stop|status|log - Start, stop, get status or set logging level of the job engine.	</li>
<li>	debug permissions true / false - Turn on permissions debugging	</li>
<li>	debug scene get - List current scene options.	</li>
<li>	debug scene set param value - Turn on scene debugging options.	</li>
<li>	debug scripts log item-id log-level - Extra debug logging for a particular script.	</li>
<li>	debug threadpool level 0..3 - Turn on logging of activity in the main thread pool.	</li>
<li>	debug threadpool set worker|iocp min|max n - Set threadpool parameters.  For debug purposes.	</li>
<li>	debug threadpool status - Show current debug threadpool parameters.	</li>
<li>	debug xengine log level - Turn on detailed xengine debugging.	</li>
<li>	delete object creator UUID - Delete scene objects by creator	</li>
<li>	delete object id UUID-or-localID - Delete a scene object by uuid or localID	</li>
<li>	delete object name --regex name - Delete a scene object by name.	</li>
<li>	delete object outside - Löscht alle Szenenobjekte außerhalb der Regionsgrenzen	</li>
<li>	delete object owner UUID - Delete scene objects by owner	</li>
<li>	delete object pos start x, start y , start z end x, end y, end z - Delete scene objects within the given volume.	</li>
<li>	delete-region name - Delete a region from disk	</li>
<li>	dump asset id - Dump an asset	</li>
<li>	dump object id UUID-or-localID - Dump the formatted serialization of the given object to the file UUID.xml	</li>
<li>	edit scale name x y z - Change the scale of a named prim	</li>
<li>	estate create owner UUID estate name - Creates a new estate with the specified name, owned by the specified user. Estate name must be unique.	</li>
<li>	estate link region estate ID region ID - Attaches the specified region to the specified estate.	</li>
<li>	estate set name estate-id new name - Sets the name of the specified estate to the specified value. New name must be unique.	</li>
<li>	estate set owner estate-id UUID | Firstname Lastname  - Sets the owner of the specified estate to the specified UUID or user.	</li>
<li>	estate show - Shows all estates on the simulator.	</li>
<li>	export-map path - Save an image of the world map	</li>
<li>	fcache assets - Attempt a deep scan and cache of all assets in all scenes	</li>
<li>	fcache clear file memory - Remove all assets in the cache.  If file or memory is specified then only this cache is cleared.	</li>
<li>	fcache expire datetime - Purge cached assets older then the specified date/time	</li>
<li>	fcache status - Display cache status	</li>
<li>	force gc - Manually invoke runtime garbage collection.  For debugging purposes	</li>
<li>	force permissions true / false - Force permissions on or off	</li>
<li>	force update - Force the update of all objects on clients	</li>
<li>	friends show --cache first-name last-name - Show the friends for the given user if they exist.	</li>
<li>	generate map - Generates and stores a new maptile.	</li>
<li>	get log level - Get the current console logging level	</li>
<li>	help item - Display help on a particular command or on a list of commands in a category	</li>
<li>	help Terrain - Get help on plugin command 'terrain'	</li>
<li>	help Terrain - Get help on plugin command 'terrain'	</li>
<li>	help Tree - Get help on plugin command 'tree'	</li>
<li>	help Tree - Get help on plugin command 'tree'	</li>
<li>	help Windlight - Get help on plugin command 'windlight'	</li>
<li>	help Windlight - Get help on plugin command 'windlight'	</li>
<li>	j2k decode ID - Do JPEG2000 decoding of an asset.	</li>
<li>	kick user first last --force message - Kick a user off the simulator	</li>
<li>	land clear - Clear all the parcels from the region.	</li>
<li>	land show local-land-id - Show information about the parcels on the region.	</li>
<li>	link-mapping x y - Set local coordinate to map HG regions to	</li>
<li>	link-region Xloc Yloc ServerURI RemoteRegionName - Link a HyperGrid Region. Examples for ServerURI: http://grid.net:8002/ or http://example.org/path/foo.php	</li>
<li>	load iar -m|--merge first last inventory path password IAR path - Load user inventory archive (IAR).	</li>
<li>	load oar -m|--merge -s|--skip-assets --default-user "User Name" --force-terrain --force-parcels --no-objects --rotation degrees --bounding-origin "x,y,z" --bounding-size "x,y,z" --displacement "x,y,z" -d|--debug OAR path - Load a region's data from an OAR archive.	</li>
<li>	load xml file name -newUID x y z - Load a region's data from XML format	</li>
<li>	load xml2 file name - Load a region's data from XML2 format	</li>
<li>	login disable - Disable simulator logins	</li>
<li>	login enable - Enable simulator logins	</li>
<li>	login status - Show login status	</li>
<li>	monitor report - Returns a variety of statistics about the current region and/or simulator	</li>
<li>	physics get param|ALL - Get physics parameter from currently selected region	</li>
<li>	physics list - List settable physics parameters	</li>
<li>	physics set param value|TRUE|FALSE localID|ALL - Set physics parameter from currently selected region	</li>
<li>	quit - Quit the application	</li>
<li>	region get - Show control information for the currently selected region (host name, max physical prim size, etc).	</li>
<li>	region restart abort message - Abort a region restart	</li>
<li>	region restart bluebox message delta seconds+ - Schedule a region restart	</li>
<li>	region restart notice message delta seconds+ - Schedule a region restart	</li>
<li>	region set - Set control information for the currently selected region.	</li>
<li>	remove-region name - Remove a region from this simulator	</li>
<li>	reset user cache - reset user cache to allow changed settings to be applied	</li>
<li>	restart - Restart the currently selected region(s) in this instance	</li>
<li>	rotate scene degrees centerX, centerY - Rotates all scene objects around centerX, centerY (default 128, 128) (please back up your region before using)	</li>
<li>	save iar -h|--home=url --noassets first last inventory path password IAR path -c|--creators -e|--exclude=name/uuid -f|--excludefolder=foldername/uuid -v|--verbose - Save user inventory archive (IAR).	</li>
<li>	save oar -h|--home=url --noassets --publish --perm=permissions --all OAR path - Save a region's data to an OAR archive.	</li>
<li>	save prims xml2 prim name file name - Save named prim to XML2	</li>
<li>	save xml file name - Save a region's data in XML format	</li>
<li>	save xml2 file name - Save a region's data in XML2 format	</li>
<li>	scale scene factor - Scales the scene objects (please back up your region before using)	</li>
<li>	scripts resume script-item-uuid+ - Resumes all suspended scripts	</li>
<li>	scripts show script-item-uuid+ - Show script information	</li>
<li>	scripts start script-item-uuid+ - Starts all stopped scripts	</li>
<li>	scripts stop script-item-uuid+ - Stops all running scripts	</li>
<li>	scripts suspend script-item-uuid+ - Suspends all running scripts	</li>
<li>	set log level level - Set the console logging level for this session.	</li>
<li>	set terrain heights corner min max x y - Sets the terrain texture heights on corner #corner to min/max, if x or y are specified, it will only set it on regions with a matching coordinate. Specify -1 in x or y to wildcard that coordinate. Corner # SW = 0, NW = 1, SE = 2, NE = 3, all corners = -1.	</li>
<li>	set terrain texture number uuid x y - Sets the terrain number to uuid, if x or y are specified, it will only set it on regions with a matching coordinate. Specify -1 in x or y to wildcard that coordinate.	</li>
<li>	set water height height x y - Sets the water height in meters.  If x and y are specified, it will only set it on regions with a matching coordinate. Specify -1 in x or y to wildcard that coordinate.	</li>
<li>	show animations first-name last-name - Show animation information for avatars in this simulator.	</li>
<li>	show appearance first-name last-name - Synonym for 'appearance show'	</li>
<li>	show asset ID - Show asset information	</li>
<li>	show caps list - Shows list of registered capabilities for users.	</li>
<li>	show caps stats by cap cap-name - Shows statistics on capabilities use by capability.	</li>
<li>	show caps stats by user first-name last-name - Shows statistics on capabilities use by user.	</li>
<li>	show checks - Show checks configured for this server	</li>
<li>	show circuits - Show agent circuit data	</li>
<li>	show connections - Show connection data	</li>
<li>	show eq - Show contents of event queues for logged in avatars.  Used for debugging.	</li>
<li>	show http-handlers - Show all registered http handlers	</li>
<li>	show hyperlinks - List the HG regions	</li>
<li>	show image queues first-name last-name - Show the image queues (textures downloaded via UDP) for a particular client.	</li>
<li>	show info - Show general information about the server	</li>
<li>	show modules - Show module data	</li>
<li>	show name uuid - Show the bindings between a single user UUID and a user name	</li>
<li>	show names - Show the bindings between user UUIDs and user names	</li>
<li>	show neighbours - Shows the local region neighbours	</li>
<li>	show object id --full UUID-or-localID - Show details of a scene object with the given UUID or localID	</li>
<li>	show object name --full --regex name - Show details of scene objects with the given name.	</li>
<li>	show object owner --full OwnerID - Show details of scene objects with given owner.	</li>
<li>	show object pos --full start x, start y , start z end x, end y, end z - Show details of scene objects within give volume	</li>
<li>	show part id UUID-or-localID - Show details of a scene object part with the given UUID or localID	</li>
<li>	show part name --regex name - Show details of scene object parts with the given name.	</li>
<li>	show part pos start x, start y , start z end x, end y, end z - Show details of scene object parts within the given volume.	</li>
<li>	show pending-objects - Show # of objects on the pending queues of all scene viewers	</li>
<li>	show pqueues full - Show priority queue data for each client	</li>
<li>	show queues full - Show queue data for each client	</li>
<li>	show ratings - Show rating data	</li>
<li>	show region - Show control information for the currently selected region (host name, max physical prim size, etc).	</li>
<li>	show regions - Show region data	</li>
<li>	show regionsinview - Shows regions that can be seen from a region	</li>
<li>	show scene - Show live information for the currently selected scene (fps, prims, etc.).	</li>
<li>	show script sensors - Show script sensors information	</li>
<li>	show script timers - Show script sensors information	</li>
<li>	show scripts script-item-uuid+ - Show script information	</li>
<li>	show stats list|all|(category.container)+ - Alias for 'stats show' command	</li>
<li>	show threadpool calls complete - Show details about threadpool calls that have been completed.	</li>
<li>	show threads - Show thread status	</li>
<li>	show throttles full - Show throttle settings for each client and for the server overall	</li>
<li>	show uptime - Show server uptime	</li>
<li>	show users full - Show user data for users currently on the region	</li>
<li>	show version - Show server version	</li>
<li>	shutdown - Quit the application	</li>
<li>	sit user name --regex first-name last-name - Sit the named user on an unoccupied object with a sit target.	</li>
<li>	stand user name --regex first-name last-name - Stand the named user.	</li>
<li>	stats record start|stop - Control whether stats are being regularly recorded to a separate file.	</li>
<li>	stats save path - Save stats snapshot to a file.  If the file already exists, then the report is appended.	</li>
<li>	stats show list|all|(category.container)+ - Show statistical information for this server	</li>
<li>	sun current_time value - time in seconds of the simulator	</li>
<li>	sun day_length value - number of hours to a day	</li>
<li>	sun day_night_offset value - induces a horizon shift	</li>
<li>	sun day_time_sun_hour_scale value - scales day light vs nite hours to change day/night ratio	</li>
<li>	sun help - list parameters that can be changed	</li>
<li>	sun list - list parameters that can be changed	</li>
<li>	sun update_interval value - how often to update the sun's position in frames	</li>
<li>	sun year_length value - number of days to a year	</li>
<li>	teleport user first-name last-name destination - Teleport a user in this simulator to the given destination	</li>
<li>	terrain bake -	</li>
<li>	terrain effect name -	</li>
<li>	terrain elevate amount -	</li>
<li>	terrain fill value -	</li>
<li>	terrain flip direction -	</li>
<li>	terrain load filename -	</li>
<li>	terrain load-tile filename file width file height minimum X tile minimum Y tile -	</li>
<li>	terrain lower amount -	</li>
<li>	terrain max min -	</li>
<li>	terrain min min -	</li>
<li>	terrain modify operation value area taper - Modifies the terrain as instructed.	</li>
<li>	Each operation can be limited to an area of effect:	-ell=x,y,rx,ry constrains the operation to an ellipse centred at x,y  -rec=x,y,dx,dy constrains the operation to a rectangle based at x,y	</li>
<li>	Each operation can have its effect tapered based on distance from centre: elliptical operations taper as cones - rectangular operations taper as pyramids	</li>
<li>	terrain multiply value -	</li>
<li>	terrain newbrushes Enabled? -	</li>
<li>	terrain rescale min max -	</li>
<li>	terrain revert -	</li>
<li>	terrain save filename -	</li>
<li>	terrain save-tile filename file width file height minimum X tile minimum Y tile -	</li>
<li>	terrain show point -	</li>
<li>	terrain stats -	</li>
<li>	threads abort thread-id - Abort a managed thread.  Use "show threads" to find possible threads.	</li>
<li>	threads show - Show thread status.  Synonym for "show threads"	</li>
<li>	translate scene xOffset yOffset zOffset - translates the scene objects (please back up your region before using)	</li>
<li>	tree active activeTF -	</li>
<li>	tree freeze copse freezeTF -	</li>
<li>	tree load filename -	</li>
<li>	tree plant copse -	</li>
<li>	tree rate updateRate -	</li>
<li>	tree reload -	</li>
<li>	tree remove copse -	</li>
<li>	tree statistics -	</li>
<li>	unlink-region local name - Unlink a hypergrid region	</li>
<li>	vivox debug on|off - Set vivox debugging	</li>
<li>	wearables check first-name last-name - Check that the wearables of a given avatar in the scene are valid.	</li>
<li>	wearables show first-name last-name - Show information about wearables for avatars.	</li>
<li>	wind base wind_update_rate value - Get or set the wind update rate.	</li>
<li>	wind ConfigurableWind avgDirection value - average wind direction in degrees	</li>
<li>	wind ConfigurableWind avgStrength value - average wind strength	</li>
<li>	wind ConfigurableWind rateChange value - rate of change	</li>
<li>	wind ConfigurableWind varDirection value - allowable variance in wind direction in +/- degrees	</li>
<li>	wind ConfigurableWind varStrength value - allowable variance in wind strength	</li>
<li>	wind SimpleRandomWind strength value - wind strength	</li>
<li>	windlight disable -	</li>
<li>	windlight enable -	</li>
<li>	windlight load -	</li>
<li>	xengine status - Show status information	</li>
<li>		</li></b>
</ul>
</div>

<!-- Post es klingelt das Telefon -->
<?php if (!isset($_POST['telefon'])): ?>

<!-- Start Abfrage Nutzer -->
<form class="w3-container w3-card-4 w3-light-gray" style="width:40%" action="" method="post">
    <input type="hidden" name="telefon" value="1" />
	
<!-- OpenSim Einstellung --> 
	<div class="w3-row w3-section">
	<p><label class="w3-text"><i class="fa fa-cogs" style="font-size:48px;color:grey"></i></label></p>
    <p><label for="base" class="w3-label control-label"><i class="fa fa-pencil" style="font-size:24px"></i>  OpenSim IP:</b></label></p>
        <div class="w3-half">
            <p><input class="w3-input w3-border w3-pale-green w3-bottombar" type="text" placeholder="OpenSim IP" name="OpenSim_IP"/></p>
        </div>
    </div>
 
	<div class="w3-row w3-section">
    <p><label for="base" class="w3-label control-label"><i class="fa fa-pencil" style="font-size:24px"></i>  OpenSim Port:</b></label></p>
        <div class="w3-third">
            <p><input class="w3-input w3-border w3-pale-green w3-bottombar" type="text" placeholder="OpenSim Port" name="OpenSim_Port"/></p>
        </div>
    </div>

 	<div class="w3-row w3-section">
    <p><label for="base" class="w3-label control-label"><i class="fa fa-pencil" style="font-size:24px"></i>  OpenSim Password:</b></label></p>
        <div class="w3-threequarter">
            <p><input class="w3-input w3-border w3-pale-green w3-bottombar" type="password" placeholder="OpenSim Password" name="OpenSim_Password"/></p>
        </div>
    </div>
	
<!-- Command Eingabe --> 
 	<div class="w3-row w3-section">
	<p><label class="w3-text"><i class="glyphicon glyphicon-file" style="font-size:48px;color:grey"></i></label></p>
    <p><label for="base" class="w3-label control-label"><i class="fa fa-pencil" style="font-size:24px"></i>  OpenSim Command:</b></label></p>
        <div class="">
            <input class="w3-input w3-border w3-sand w3-bottombar" type="text" placeholder="OpenSim Command" name="OpenSim_Command"/>
        </div>
    </div> 
<br>

<!-- Command Button -->
    <div class="w3-row w3-section">
	<div class="w3-third">
        <button class="w3-btn w3-red w3-border w3-bottombar" type="submit" name="submit" ><i class="fa fa-mail-forward" style="font-size:24px"></i>   Send OpenSim command to your server</button>
		<!-- <button class="w3-btn w3-blue-grey w3-border" type="reset" name="Reset"><i class="fa fa-mail-reply" style="font-size:24px"></i>  Data Reset</button>  -->
	</div>
    </div>
</form>
<?php endif ?>	
</div>

<?php
// Eingaben auswerten und Senden
function senden() 
{
	if (isset($_POST['telefon']) AND $_POST['telefon'] == 1)
		{
			// wir schaffen unsere Variablen und alle Leerzeichen beiläufig entfernen	

			$OpenSim_IP   = trim($_POST['OpenSim_IP']);
			$OpenSim_Port   = trim($_POST['OpenSim_Port']);
			$OpenSim_Password  = $_POST['OpenSim_Password'];
			$OpenSim_Command   = trim($_POST['OpenSim_Command']);

			// Einlesen der RemoteAdmin Datei.
			include('RemoteAdmin.php');
			 
			// Mit OpenSim verbinden
			$myRemoteAdmin = new RemoteAdmin($OpenSim_IP, $OpenSim_Port, $OpenSim_Password);
			 
			// OpenSim Konsolenbefehl samt parameter senden
			$parameters = array('command' => $OpenSim_Command);
			$myRemoteAdmin->SendCommand('admin_console_command', $parameters);
			// Jetzt die Seite neu starten auffrischen oder sowas
			?><meta http-equiv="refresh" content="0; URL=#Top"><?php
		}
}

// Die Funktion senden aufrufen
senden();
?>

</div>
</body>
</html>	

<?php } ?>