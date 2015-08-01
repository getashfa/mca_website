<!-- filter drop down animation script -->
<script>
function toggleNavPanel(x){
    var panel = document.getElementById(x), navarrow = document.getElementById("navarrow"), maxH="320px";
    if(panel.style.height == maxH){
        panel.style.height = "0px";
        navarrow.innerHTML = "&#9662;";
    } else {
        panel.style.height = maxH;
        navarrow.innerHTML = "&#9652;";
    }
}
</script>


<div id="topbar">
  <div id="logo"><img src="images/icons/movies.png" /></div>
  <div id="search-holder"><?php include 'search.php'; ?></div>
  <div id="sections_btn_holder">
 		<button onclick="toggleNavPanel('sections_panel')">Filter <span id="navarrow">&#9662;</span></button>
  </div>
  <div id="sections_link_holder"><a href="movieUpload.php?">Upload Movie</a></div>
  
  <div id="sections_panel">
    
     	
        <div class="filter">

	<form action="movies.php" method="post">
    	<ul>
				<li>&nbsp;<span class="filter-tag">Actor:</span><br />
            		<select name="actor">
                    	<option value="'%%'">All</option>
                   		<option value="'Aju Varghese'">Aju Varghese</option>
                        <option value="'Anoop Menon'">Anoop Menon</option>
                        <option value="'Ashokan'">Ashokan</option>
                        <option value="'Asif Ali'">Asif Ali</option>
                        <option value="'Baburaj'">Baburaj</option>
                        <option value="'Balachandra Menon'">Balachandra Menon</option>
                        <option value="'Bharath Gopi'">Bharath Gopi</option>
                        <option value="'Bheeman Raghu'">Bheeman Raghu</option>
                        <option value="'Biju Menon'">Biju Menon</option>
                        <option value="'Boban Alummoodan'">Boban Alummoodan</option>
                        <option value="'Devan'">Devan</option>
                        <option value="'Dileep'">Dileep</option>
                        <option value="'Dulquer Salmaan'">Dulquer Salmaan</option>
                        <option value="'Fahadh Faasil'">Fahadh Faasil</option>
                        <option value="'Farhaan Faasil'">Farhaan Faasil</option>
                        <option value="'Ganesh Kumar'">Ganesh Kumar</option>
                        <option value="'Indrajith Sukumaran'">Indrajith Sukumaran</option>
                        <option value="'Innocent'">Innocent</option>
                        <option value="'Jagadeesh'">Jagadeesh</option>
                        <option value="'Jagathi Sreekumar'">Jagathi Sreekumar</option>
                        <option value="'jayan'">jayan</option>
                        <option value="'Jayaram'">Jayaram</option>
                        <option value="'Jayasurya'">Jayasurya</option>
                        <option value="'Kalabhavan Mani'">Kalabhavan Mani</option>
                        <option value="'Kalabhavan Navas'">Kalabhavan Navas</option>
                        <option value="'kalabhavan shajon'">kalabhavan shajon</option>
                        <option value="'Kalashala Babu'">Kalashala Babu</option>
                        <option value="'Kamal Haasan'">Kamal Haasan</option>
                        <option value="'Kochin Haneefa'">Kochin Haneefa</option>
                        <option value="'Kochupreman'">Kochupreman</option>
                        <option value="'Kollam Tulasi'">Kollam Tulasi</option>
                        <option value="'Kottayam Nazeer'">Kottayam Nazeer</option>
                        <option value="'Kunchacko Boban'">Kunchacko Boban</option>
                        <option value="'Kuthiravattam Pappu'">Kuthiravattam Pappu</option>
                        <option value="'Lal'">Lal</option>
                        <option value="'M. G. Soman'">M. G. Soman</option>
                        <option value="'Mammootty'">Mammootty</option>
                        <option value="'Maniyanpilla Raju'">Maniyanpilla Raju</option>
                        <option value="'Manoj K Jayan'">Manoj K Jayan</option>
                        <option value="'Mohanlal'">Mohanlal</option>
                        <option value="'Mukesh'">Mukesh</option>
                        <option value="'Murali'">Murali</option>
                        <option value="'Murali'">Murali</option>
                        <option value="'Murali Gopy'">Murali Gopy</option>
                        <option value="'Narain'">Narain</option>
                        <option value="'Nazeer'">Nazeer</option>
                        <option value="'neeraj madhav'">neeraj madhav</option>
                        <option value="'Nivin Pauly'">Nivin Pauly</option>
                        <option value="'Prem Nazir'">Prem Nazir</option>
                        <option value="'Prithviraj Sukumaran'">Prithviraj Sukumaran</option>
                        <option value="'Rahman'">Rahman</option>
                        <option value="'Ratheesh'">Ratheesh</option>
                        <option value="'Saikumar'">Saikumar</option>
                        <option value="'Salim Kumar'">Salim Kumar</option>
                        <option value="'Sankaradi'">Sankaradi</option>
                        <option value="'Sathyan'">Sathyan</option>
                        <option value="'Shankar'">Shankar</option>
                        <option value="'Shine Tom Chacko'">Shine Tom Chacko</option>
                        <option value="'Siddique'">Siddique</option>
                        <option value="'Spadikam George'">Spadikam George</option>
                        <option value="'Sreejith Ravi'">Sreejith Ravi</option>
                        <option value="'Sreenath bhasi'">Sreenath bhasi</option>
                        <option value="'Sreenivasan'">Sreenivasan</option>
                        <option value="'Sreenivasan'">Sreenivasan</option>
                        <option value="'Sunny Wayn'">Sunny Wayn</option>
                        <option value="'Suraj Venjaramoodu'">Suraj Venjaramoodu</option>
                        <option value="'Suresh Gopi'">Suresh Gopi</option>
                        <option value="'Thikkurissi'">Thikkurissi</option>
                        <option value="'Thilakan'">Thilakan</option>
                        <option value="'Undappakru'">Undappakru</option>
                        <option value="'Unni Mukundan'">Unni Mukundan</option>
                        <option value="'Venu Nagavally'">Venu Nagavally</option>
                        <option value="'Vijayaraghavan'">Vijayaraghavan</option>
                        <option value="'Vikram'">Vikram</option>
                        <option value="'Vincent'">Vincent</option>
                        <option value="'Vineeth Sreenivasan'">Vineeth Sreenivasan</option>
                	</select>
            	</li>
                <li>&nbsp;<span class="filter-tag">Actress:</span><br />
            		<select name="actress">
                    	<option value="'%%'">All</option>
                    	<option value="'Abhirami'">Abhirami</option>
                        <option value="'Ahana Krishna'">Ahana Krishna</option>
                        <option	value="'Amala Paul'">Amala Paul</option>
                        <option value="'Ambika'">Ambika</option>
                        <option value="'Andrea Jeremiah'">Andrea Jeremiah</option>
                        <option value="'Andrea Jeremiah'">Andrea Jeremiah</option>
                        <option value="'Ann Augustine'">Ann Augustine</option>
                        <option	value="'Anusree'">Anusree</option>
                        <option value="'Aparna Gopinath'">Aparna Gopinath</option>
                        <option value="'Aparna Nair'">Aparna Nair</option>
                        <option value="'Archana Kavi'">Archana Kavi</option>
                        <option value="'Asha Sarath'">Asha Sarath</option>
                        <option value="'Bhama'">Bhama</option>
                        <option value="'Bhavana'">Bhavana</option>
                        <option value="'Bindu Panicker'">Bindu Panicker</option>
                        <option value="'Divya Unni'">Divya Unni</option>
                        <option value="'Geetha'">Geetha</option>
                        <option value="'Geetu Mohandas'">Geetu Mohandas</option>
                        <option value="'Gopika'">Gopika</option>
                        <option value="'Honey Rose'">Honey Rose</option>
                        <option value="'Isha Talwar'">Isha Talwar</option>
                        <option value="'Jalaja'">Jalaja</option>
                        <option value="'Janani Iyer'">Janani Iyer</option>
                        <option value="'Jasmin Bhasin'">Jasmin Bhasin</option>
                        <option value="'Juhi Chawla'">Juhi Chawla</option>
                        <option value="'Kalaranjini'">Kalaranjini</option>
                        <option value="'Kalpana'">Kalpana</option>
                        <option value="'Kanaka'">Kanaka</option>
                        <option value="'Kaniha'">Kaniha</option>
                        <option value="'Karthika'">Karthika</option>
                        <option value="'Kavya Madhavan'">Kavya Madhavan</option>
                        <option value="'Lakshmi Gopalaswamy'">Lakshmi Gopalaswamy</option>
                        <option value="'Lakshmi Menon'">Lakshmi Menon</option>
                        <option value="'Lissy'">Lissy</option>
                        <option value="'Mamta Mohandas'">Mamta Mohandas</option>
                        <option value="'Manju Warrier'">Manju Warrier</option>
                        <option value="'Meena'">Meena</option>
                        <option value="'Meera Jasmine'">Meera Jasmine</option>
                        <option value="'Meera Nandan'">Meera Nandan</option>
                        <option value="'Menaka'">Menaka</option>
                        <option value="'Mithra Kurian'">Mithra Kurian</option>
                        <option value="'Miya'">Miya</option>
                        <option value="'Muktha'">Muktha</option>
                        <option value="'Mythili'">Mythili</option>
                        <option value="'Namitha Pramod'">Namitha Pramod</option>
                        <option value="'Navya Nair'">Navya Nair</option>
                        <option value="'Nayantara'">Nayantara</option>
                        <option value="'Nazriya Nazim'">Nazriya Nazim</option>
                        <option value="'Nikki Galrani'">Nikki Galrani</option>
                        <option value="'Nisha Agarwal'">Nisha Agarwal</option>
                        <option value="'Nithya Menon'">Nithya Menon</option>
                        <option value="'Nyla Usha'">Nyla Usha</option>
                        <option value="'Padmapriya'">Padmapriya</option>
                        <option value="'Philomena'">Philomena</option>
                        <option value="'Priyamani'">Priyamani</option>
                        <option value="'Radikha'">Radikha</option>
                        <option value="'Reenu Mathews'">Reenu Mathews</option>
                        <option value="'Reenu Mathews'">Reenu Mathews</option>
                        <option value="'Remya Nambeesan '">Remya Nambeesan </option>
                        <option value="'Revathy'">Revathy</option>
                        <option value="'Rima Kallingal'">Rima Kallingal</option>
                        <option value="'Samvrutha Sunil'">Samvrutha Sunil</option>
                        <option value="'Sarayu'">Sarayu</option>
                        <option value="'Shalini'">Shalini</option>
                        <option value="'Shanthi Krishna'">Shanthi Krishna</option>
                        <option value="'Shwetha Menon'">Shwetha Menon</option>
                        <option value="'Silk Smitha'">Silk Smitha</option>
                        <option value="'Sneha'">Sneha</option>
                        <option value="'Sobhana'">Sobhana</option>
                        <option value="'Srinda Ashab'">Srinda Ashab</option>
                        <option value="'Suchitra'">Suchitra</option>
                        <option value="'Sukanya'">Sukanya</option>
                        <option value="'Sukumari'">Sukumari</option>
                        <option value="'Sumalatha'">Sumalatha</option>
                        <option value="'Sunitha'">Sunitha</option>
                        <option value="'Suparna'">Suparna</option>
                        <option value="'Swathi Reddy'">Swathi Reddy</option>
                        <option value="'Thabu'">Thabu</option>
                        <option value="'Unni Mary'">Unni Mary</option>
                        <option value="'Urmila Matondkar'">Urmila Matondkar</option>
                        <option value="'Urvashi'">Urvashi</option>
                        <option value="'Vani Vishwanath'">Vani Vishwanath</option>
                	</select>
            	</li>
                <li>&nbsp;<span class="filter-tag">Director:</span><br />
            		<select name="director">
                    	<option value="'%%'">All..</option>
                    	<option value="'Aashique Abu'">Aashique Abu</option>
                        <option value="'Abrid Shine'">Abrid Shine</option>
                        <option value="'Adoor Gopalakrishnan'">Adoor Gopalakrishnan</option>
                        <option value="'Akku Akbar'">Akku Akbar</option>
                        <option value="'Alphonse Putharen'">Alphonse Putharen</option>
                        <option value="'Anil C Menon'">Anil C Menon</option>
                        <option value="'Anil C. Menon'">Anil C. Menon</option>
                        <option value="'Anil Radhakrishnan Menon'">Anil Radhakrishnan Menon</option>
                        <option value="'Anjali Menon'">Anjali Menon</option>
                        <option value="'Anoop Kannan'">Anoop Kannan</option>
                        <option value="'Anwar Rasheed'">Anwar Rasheed</option>
                        <option value="'Arun Kumar Aravind'">Arun Kumar Aravind</option>
                        <option value="'B. Unnikrishnan'">B. Unnikrishnan</option>
                        <option value="'Babu Janardhanan'">Babu Janardhanan</option>
                        <option value="'Balachandra Menon'">Balachandra Menon</option>
                        <option value="'Bhadran'">Bhadran</option>
                        <option value="'Bharathan'">Bharathan</option>
                        <option value="'Blessy'">Blessy</option>
                        <option value="'Boban Samuel'">Boban Samuel</option>
                        <option value="'Cochin Haneefa'">Cochin Haneefa</option>
                        <option value="'Deepan'">Deepan</option>
                        <option value="'Deepu Karunakaran'">Deepu Karunakaran</option>
                        <option value="'Dennis Joseph'">Dennis Joseph</option>
                        <option value="'Dr. Biju'">Dr. Biju</option>
                        <option value="'Fazil'">Fazil</option>
                        <option value="'G. Aravindan'">G. Aravindan</option>
                        <option value="'Haridas'">Haridas</option>
                        <option value="'Hariharan'">Hariharan</option>
                        <option value="'I V Sasi'">I V Sasi</option>
                        <option value="'Jayaraj'">Jayaraj</option>
                        <option value="'Jean Paul Lal'">Jean Paul Lal</option>
                        <option value="'Jeethu Joseph'">Jeethu Joseph</option>
                        <option value="'Johny Antony'">Johny Antony</option>
                        <option value="'Jose Thomas'">Jose Thomas</option>
                        <option value="'Joshy'">Joshy</option>
                        <option value="'Jude Anthany Joseph'">Jude Anthany Joseph</option>
                        <option value="'K. G. George'">K. G. George</option>
                        <option value="'K. Madhu'">K. Madhu</option>
                        <option value="'K.G George'">K.G George</option>
                        <option value="'Kamal'">Kamal</option>
                        <option value="'Lal'">Lal</option>
                        <option value="'Lal Jose'">Lal Jose</option>
                        <option value="'Lenin Rajendran'">Lenin Rajendran</option>
                        <option value="'Leo Thaddeus'">Leo Thaddeus</option>
                        <option value="'Lijo Jose Pellissery'">Lijo Jose Pellissery</option>
                        <option value="'Lohithadas'">Lohithadas</option>
                        <option value="'M. Padmakumar'">M. Padmakumar</option>
                        <option value="'M. T. Vasudevan Nair'">M. T. Vasudevan Nair</option>
                        <option value="'Madhav Ramadasan'">Madhav Ramadasan</option>
                        <option value="'Madhu Kaithapram'">Madhu Kaithapram</option>
                        <option value="'Madhupal'">Madhupal</option>
                        <option value="'Major Ravi'">Major Ravi</option>
                        <option value="'Martin Prackat'">Martin Prackat</option>
                        <option value="'Mohan'">Mohan</option>
                        <option value="'P. N. Menon'">P. N. Menon</option>
                        <option value="'P.G Vishwambaran'">P.G Vishwambaran</option>
                        <option value="'P.T. Kunju Muhammed'">P.T. Kunju Muhammed</option>
                        <option value="'Padmarajan'">Padmarajan</option>
                        <option value="'Pratap K. Pothen'">Pratap K. Pothen</option>
                        <option value="'Priyadarshan'">Priyadarshan</option>
                        <option value="'Priyanandanan'">Priyanandanan</option>
                        <option value="'Rafi Mecartin'">Rafi Mecartin</option>
                        <option value="'Raj Babu'">Raj Babu</option>
                        <option value="'Rajasenan'">Rajasenan</option>
                        <option value="'Rajeev Ravi'">Rajeev Ravi</option>
                        <option value="'Rajesh Pillai'">Rajesh Pillai</option>
                        <option value="'Ranjith Balakrishnan'">Ranjith Balakrishnan</option>
                        <option value="'Ranjith Sankar'">Ranjith Sankar</option>
                        <option value="'Renji Panicker'">Renji Panicker</option>
                        <option value="'Rosshan Andrrews'">Rosshan Andrrews</option>
                        <option value="'Saji Surendran'">Saji Surendran</option>
                        <option value="'Salim Ahamed'">Salim Ahamed</option>
                        <option value="'Sameer Thahir'">Sameer Thahir</option>
                        <option value="'Sangeeth Sivan'">Sangeeth Sivan</option>
                        <option value="'Santhosh Sivan'">Santhosh Sivan</option>
                        <option value="'Santhosh Nair'">Santhosh Nair</option>
                        <option value="'Sathyan Anthikad'">Sathyan Anthikad</option>
                        <option value="'Shafi'">Shafi</option>
                        <option value="'Shaji Kailas'">Shaji Kailas</option>
                        <option value="'Shaji N. Karun'">Shaji N. Karun</option>
                        <option value="'Shajoon Karyal'">Shajoon Karyal</option>
                        <option value="'Shyamaprasad'">Shyamaprasad</option>
                        <option value="'Sibi Malayail'">Sibi Malayail</option>
                        <option value="'Siddharth Bharathan'">Siddharth Bharathan</option>
                        <option value="'Siddique Lal'">Siddique Lal</option>
                        <option value="'Sidhartha Shiva'">Sidhartha Shiva</option>
                        <option value="'Sreekumaran Thambi'">Sreekumaran Thambi</option>
                        <option value="'Sreenivasan'">Sreenivasan</option>
                        <option value="'Srinath Rajendran'">Srinath Rajendran</option>
                        <option value="'Sugeeth'">Sugeeth</option>
                        <option value="'Sunder Das'">Sunder Das</option>
                        <option value="'T. K. Rajeev Kumar'">T. K. Rajeev Kumar</option>
                        <option value="'T. V. Chandran'">T. V. Chandran</option>
                        <option value="'Thaha'">Thaha</option>
                        <option value="'Thambi Kannanthanam'">Thambi Kannanthanam</option>
                        <option value="'Thulasidas'">Thulasidas</option>
                        <option value="'V. K. Prakash'">V. K. Prakash</option>
                        <option value="'V. M. Vinu'">V. M. Vinu</option>
                        <option value="'Venu'">Venu</option>
                        <option value="'Venu Nagavalli'">Venu Nagavalli</option>
                        <option value="'Viji Thampi'">Viji Thampi</option>
                        <option value="'Vinayan'">Vinayan</option>
                        <option value="'Vineeth Sreenivasan'">Vineeth Sreenivasan</option>
                        <option value="'Vysakh'">Vysakh</option>
                	</select>
            	</li>
                <li>&nbsp;<span class="filter-tag">Year:</span><br />
            		<select name="year">
                    <option value="'%%'">Any</option>
                    <option value="'2015'">2015</option>
                    <option value="'2014'">2014</option>
                    <option value="'2013'">2013</option>
                    <option value="'2012'">2012</option>
                    <option value="'2011'">2011</option>
                    <option value="'2010'">2010</option>
                    <option value="'2009'">2009</option>
                    <option value="'2008'">2008</option>
                    <option value="'2007'">2007</option>
                    <option value="'2006'">2006</option>
                    <option value="'2005'">2005</option>
                    <option value="'2004'">2004</option>
                    <option value="'2003'">2003</option>
					<option value="'2002'">2002</option>
                    <option value="'2001'">2001</option>
                    <option value="'2000'">2000</option>
                    <option value="'1999'">1999</option>
                    <option value="'1998'">1998</option>
                    <option value="'1997'">1997</option>
					<option value="'1996'">1996</option>
                    <option value="'1995'">1995</option>
                    <option value="'1994'">1994</option>
                    <option value="'1993'">1993</option>
                    <option value="'1992'">1992</option>
                    <option value="'1991'">1991</option>
                    <option value="'1990'">1990</option>
                    <option value="'1989'">1989</option>
                    <option value="'1988'">1988</option>
                    <option value="'1987'">1987</option>
                    <option value="'1986'">1986</option>
                    <option value="'1985'">1985</option>
                    <option value="'1984'">1984</option>
                    <option value="'1983'">1983</option>
                 	<option value="'1982'">1982</option>
                    <option value="'1981'">1981</option>
					<option value="'1980'">1980</option>
                	</select>
            	</li>
            	
                <li>
                	<br /><input type="submit" name="submit" value="Filter" />
                </li>
                <li>  <a href="movies.php" class="clear-btn">Clear</a></li>
		</ul>
    </form>
</div>
        
    </div>
  </div>

<div class="clearer"></div>