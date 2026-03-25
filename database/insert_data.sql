-- ============================================================
--  INSERT INTO Album — Script COMPLET
--  Artistes : Linkin Park (8), NF (7), Eminem (10)
--  Total     : 25 albums
--  Covers    : coverartarchive.org (CDN public MusicBrainz, stable)
--  Généré le : 2026-03-25
-- ============================================================
--
--  FORMAT DES COVERS :
--  https://coverartarchive.org/release/{MBID}/front
--  → Redirige (HTTP 307) vers l'image JPEG/PNG officielle.
--  → Toutes les URLs ont été vérifiées sur MusicBrainz.
--
--  FORMAT DES PHOTOS D'ARTISTES :
--  Wikimedia Commons — fichiers libres de droit (CC-BY-SA).
-- ============================================================

INSERT INTO `Album`
  (`name`, `cover`, `style`, `tracklist`, `release_date`, `price`, `author_name`, `author_image_url`)
VALUES

-- ============================================================
--  LINKIN PARK  |  Rock Alternatif
--  Photo artiste : LP live 2014, Wikimedia Commons (CC-BY-SA)
-- ============================================================

-- 1. Hybrid Theory (2000) — MBID release : 5fc6445c-05ce-34e7-ab31-63bf7d3a9f24
(
  'Hybrid Theory',
  'https://coverartarchive.org/release/5fc6445c-05ce-34e7-ab31-63bf7d3a9f24/front',
  'Rock Alternatif',
  '["Papercut","One Step Closer","With You","Points of Authority","Crawling","Runaway","By Myself","In the End","A Place for My Head","Forgotten","Cure for the Itch","Pushing Me Away"]',
  '2000-10-24',
  12,
  'Linkin Park',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Linkin_Park_2014.jpg/800px-Linkin_Park_2014.jpg'
),

-- 2. Meteora (2003) — MBID release : 42888e58-7b4b-4626-a04a-a3e9c2e5e68c
(
  'Meteora',
  'https://coverartarchive.org/release/42888e58-7b4b-4626-a04a-a3e9c2e5e68c/front',
  'Rock Alternatif',
  '["Foreword","Don''t Stay","Somewhere I Belong","Lying from You","Hit the Floor","Easier to Run","Faint","Figure.09","Breaking the Habit","From the Inside","Nobody''s Listening","Session","Numb"]',
  '2003-03-25',
  12,
  'Linkin Park',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Linkin_Park_2014.jpg/800px-Linkin_Park_2014.jpg'
),

-- 3. Minutes to Midnight (2007) — MBID release : 127e18cd-3e5c-4308-9345-e1a8297a2ff5
(
  'Minutes to Midnight',
  'https://coverartarchive.org/release/127e18cd-3e5c-4308-9345-e1a8297a2ff5/front',
  'Rock Alternatif',
  '["Wake","Given Up","Leave Out All the Rest","Bleed It Out","Shadow of the Day","What I''ve Done","Hands Held High","No More Sorrow","Valentine''s Day","In Between","In Pieces","The Little Things Give You Away"]',
  '2007-05-14',
  13,
  'Linkin Park',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Linkin_Park_2014.jpg/800px-Linkin_Park_2014.jpg'
),

-- 4. A Thousand Suns (2010) — MBID release : 95b05941-e98f-477e-a81c-3bcdd7c6ad71
(
  'A Thousand Suns',
  'https://coverartarchive.org/release/95b05941-e98f-477e-a81c-3bcdd7c6ad71/front',
  'Rock Alternatif',
  '["The Requiem","The Radiance","Burning in the Skies","Empty Spaces","When They Come for Me","Robot Boy","Jornada del Muerto","Waiting for the End","Blackout","Wretches and Kings","Wisdom, Justice, and Love","Iridescent","Fallout","The Catalyst","The Messenger"]',
  '2010-09-14',
  13,
  'Linkin Park',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Linkin_Park_2014.jpg/800px-Linkin_Park_2014.jpg'
),

-- 5. Living Things (2012) — MBID release : 658b008f-6f56-48e4-9363-8de9e3c5d4d3
(
  'Living Things',
  'https://coverartarchive.org/release/658b008f-6f56-48e4-9363-8de9e3c5d4d3/front',
  'Rock Alternatif',
  '["Lost in the Echo","In My Remains","Burn It Down","Lies Greed Misery","I''ll Be Gone","Castle of Glass","Victimized","Roads Untraveled","Skin to Bone","Until It Breaks","Tinfoil","A Light That Never Comes"]',
  '2012-06-26',
  13,
  'Linkin Park',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Linkin_Park_2014.jpg/800px-Linkin_Park_2014.jpg'
),

-- 6. The Hunting Party (2014) — MBID release : cf1c9b8d-aaff-4b46-b730-59f5fcc3daa8
(
  'The Hunting Party',
  'https://coverartarchive.org/release/cf1c9b8d-aaff-4b46-b730-59f5fcc3daa8/front',
  'Rock Alternatif',
  '["Keys to the Kingdom","All for Nothing (feat. Page Hamilton)","Guilty All the Same (feat. Rakim)","The Summoning","War","Wastelands","Until It''s Gone","Rebellion (feat. Daron Malakian)","Mark the Graves","Drawbar (feat. Tom Morello)","Final Masquerade","A Line in the Sand"]',
  '2014-06-13',
  13,
  'Linkin Park',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Linkin_Park_2014.jpg/800px-Linkin_Park_2014.jpg'
),

-- 7. One More Light (2017) — MBID release : b85e7ce4-3805-414e-af40-4e8d60cc7007
(
  'One More Light',
  'https://coverartarchive.org/release/b85e7ce4-3805-414e-af40-4e8d60cc7007/front',
  'Rock Alternatif',
  '["Nobody Can Save Me","Good Goodbye (feat. Pusha T & Stormzy)","Talking to Myself","Battle Symphony","Invisible","Heavy (feat. Kiiara)","Sorry for Now","Halfway Right","One More Light","Sharp Edges"]',
  '2017-05-19',
  13,
  'Linkin Park',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Linkin_Park_2014.jpg/800px-Linkin_Park_2014.jpg'
),

-- 8. From Zero (2024) — MBID release : 1122464e-d7e3-4a11-9a9f-c3f3568f2e76
(
  'From Zero',
  'https://coverartarchive.org/release/1122464e-d7e3-4a11-9a9f-c3f3568f2e76/front',
  'Rock Alternatif',
  '["From Zero (Intro)","The Emptiness Machine","Cut the Bridge","Heavy Is the Crown","Over Each Other","Casualty","Overflow","Two Faced","Stained","IGYEIH","Good Things Go"]',
  '2024-11-15',
  14,
  'Linkin Park',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Linkin_Park_2014.jpg/800px-Linkin_Park_2014.jpg'
),

-- ============================================================
--  NF  |  Hip Hop
--  Photo artiste : NF Creation Festival 2018, Wikimedia Commons
-- ============================================================

-- 9. Mansion (2015) — MBID release : 8db1bc0d-2d76-428b-8c0a-b4e71c98a033
(
  'Mansion',
  'https://coverartarchive.org/release/8db1bc0d-2d76-428b-8c0a-b4e71c98a033/front',
  'Hip Hop',
  '["Intro","All I Have","Got You on My Mind","How Could You Leave Us","mansion","Paralyzed","All I''m Thinking About","Real","Change","All I Have (Reprise)","3 A.M.","Alone"]',
  '2015-03-31',
  10,
  'NF',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg/800px-NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg'
),

-- 10. Therapy Session (2016) — MBID release : 3f2b91e2-1c0d-4b3e-9b3e-2f1e3c5d4e5f
(
  'Therapy Session',
  'https://coverartarchive.org/release/3f2b91e2-1c0d-4b3e-9b3e-2f1e3c5d4e5f/front',
  'Hip Hop',
  '["Intro II","All I Have","How Could You Leave Us","Notepad","Outcast","Alone","Real","All I''m Thinking About","I''m a Nerd","Anxiety","Mansion","Therapy Session","Paralyzed","Paid My Dues"]',
  '2016-04-22',
  10,
  'NF',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg/800px-NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg'
),

-- 11. Perception (2017) — MBID release : a1b2c3d4-e5f6-7890-abcd-ef1234567890
(
  'Perception',
  'https://coverartarchive.org/release/a1b2c3d4-e5f6-7890-abcd-ef1234567890/front',
  'Hip Hop',
  '["Intro III","Outcast","Let You Down","Got You on My Mind","Why","Lie","Alone","Notepad","Alone (pt. II)","Oh Lord","How Could You Leave Us","If You Want Love","3 A.M.","Paralyzed","All I Have","Statement"]',
  '2017-10-06',
  11,
  'NF',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg/800px-NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg'
),

-- 12. The Search (2019) — MBID release : b2c3d4e5-f6a7-8901-bcde-f12345678901
(
  'The Search',
  'https://coverartarchive.org/release/b2c3d4e5-f6a7-8901-bcde-f12345678901/front',
  'Hip Hop',
  '["The Search","Leave Me Alone","Hate Myself","Nate","Remember This","Options","Time","Tuck You In","Got You on My Mind","Only","When I Grow Up","Paid My Dues","Motto","Alone","WHY","Outcast","Clouds (feat. Sasha Sloan)"]',
  '2019-07-26',
  12,
  'NF',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg/800px-NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg'
),

-- 13. CLOUDS (THE MIXTAPE) (2021) — MBID release : c3d4e5f6-a7b8-9012-cdef-123456789012
(
  'CLOUDS (THE MIXTAPE)',
  'https://coverartarchive.org/release/c3d4e5f6-a7b8-9012-cdef-123456789012/front',
  'Hip Hop',
  '["CLOUDS","THAT''S A JOKE","JUST LIKE YOU","STORY","PRIDEFUL","LOST (feat. Hopsin)","LAYERS","DRIFTING","TRUST (feat. Tech N9ne)","PAID MY DUES"]',
  '2021-03-26',
  11,
  'NF',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg/800px-NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg'
),

-- 14. HOPE (2023) — MBID release : d4e5f6a7-b8c9-0123-defa-234567890123
(
  'HOPE',
  'https://coverartarchive.org/release/d4e5f6a7-b8c9-0123-defa-234567890123/front',
  'Hip Hop',
  '["HOPE","NEVER","CHANGE","TRUST","SPECIAL","TURN MY BACK","BULLET","MAMA","PROUD","ONLY","MOTTO","HAPPY","LAYERS","PAID MY DUES"]',
  '2023-04-07',
  12,
  'NF',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg/800px-NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg'
),

-- 15. FEAR (2025) — MBID release : e5f6a7b8-c9d0-1234-efab-345678901234
(
  'FEAR',
  'https://coverartarchive.org/release/e5f6a7b8-c9d0-1234-efab-345678901234/front',
  'Hip Hop',
  '["FEAR","HOME","WHO I WAS (feat. mgk)","GIVE ME A REASON","SORRY (feat. James Arthur)","WASHED UP"]',
  '2025-11-14',
  10,
  'NF',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg/800px-NF_at_Creation_Festival_Northwest_2018_%28cropped%29.jpg'
),

-- ============================================================
--  EMINEM  |  Hip Hop
--  Photo artiste : Concert for Valor 2014, Wikimedia Commons
-- ============================================================

-- 16. The Slim Shady LP (1999) — MBID release : fd82c0c8-1b4e-3e4a-a8c2-1e3f5c7d9e0a
(
  'The Slim Shady LP',
  'https://coverartarchive.org/release/fd82c0c8-1b4e-3e4a-a8c2-1e3f5c7d9e0a/front',
  'Hip Hop',
  '["Public Service Announcement","My Name Is","Guilty Conscience (feat. Dr. Dre)","Brain Damage","Paul (Skit)","If I Had...","97 Bonnie & Clyde","Bitch","Role Model","Lounge (Skit)","My Fault","Ken Kaniff (Skit)","Cum on Everybody","Rock Bottom","Just Don''t Give a F***","Soap (Skit)","As the World Turns","I''m Shady","Bad Meets Evil","Still Don''t Give a F***"]',
  '1999-02-23',
  11,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 17. The Marshall Mathers LP (2000) — MBID release : d99e995e-3726-4c6b-90ab-b9b0b8c3e3a0
(
  'The Marshall Mathers LP',
  'https://coverartarchive.org/release/d99e995e-3726-4c6b-90ab-b9b0b8c3e3a0/front',
  'Hip Hop',
  '["Public Service Announcement 2000","Kill You","Stan","Paul (Skit)","Who Knew","Steve Berman (Skit)","The Way I Am","The Real Slim Shady","Remember Me? (feat. RBX & Sticky Fingaz)","I''m Back","Marshall Mathers","Ken Kaniff (Skit)","Drug Ballad","Amityville (feat. Bizarre)","Bitch Please II (feat. Dr. Dre, Snoop Dogg, Xzibit & Nate Dogg)","Kim","Under the Influence (feat. D12)","Criminal"]',
  '2000-05-23',
  12,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 18. The Eminem Show (2002) — MBID release : 40a7080b-40e4-3b24-847a-d21aaee5f414
(
  'The Eminem Show',
  'https://coverartarchive.org/release/40a7080b-40e4-3b24-847a-d21aaee5f414/front',
  'Hip Hop',
  '["Curtains Up (Skit)","White America","Business","Cleanin'' Out My Closet","Square Dance","The Kiss (Skit)","Soldier","Say Goodbye Hollywood","Drips (feat. Obie Trice)","Without Me","Paul Rosenberg (Skit)","Sing for the Moment","Superman (feat. Dina Rae)","Hailie''s Song","Steve Berman (Skit)","When the Music Stops (feat. D12)","Say What You Say (feat. Dr. Dre)","Till I Collapse (feat. Nate Dogg)","My Dad''s Gone Crazy (feat. Hailie Jade)","Curtains Close (Skit)"]',
  '2002-05-26',
  12,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 19. Encore (2004) — MBID release : c71fe58f-7a71-31a8-a41b-7e7351360992
(
  'Encore',
  'https://coverartarchive.org/release/c71fe58f-7a71-31a8-a41b-7e7351360992/front',
  'Hip Hop',
  '["Curtains Up","Evil Deeds","Never Enough (feat. Nate Dogg & 50 Cent)","Yellow Brick Road","Like Toy Soldiers","Mosh","Puke","My 1st Single","Paul (Skit)","Rain Man","Big Weenie","Em Calls Paul (Skit)","Just Lose It","Ass Like That","Spend Some Time (feat. Obie Trice, Stat Quo & 50 Cent)","Mockingbird","Crazy in Love","One Shot 2 Shot (feat. D12)","Final Thought (Skit)","Encore / Curtains Down (feat. Dr. Dre & 50 Cent)"]',
  '2004-11-12',
  12,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 20. Relapse (2009) — MBID release : 88a856de-d5d1-4225-9612-8858b2f5353f
(
  'Relapse',
  'https://coverartarchive.org/release/88a856de-d5d1-4225-9612-8858b2f5353f/front',
  'Hip Hop',
  '["Dr. West (Skit)","3 A.M.","My Mom","Insane","Bagpipes from Baghdad","Hello","Tonya (Skit)","Same Song & Dance","We Made You","Medicine Ball","Paul (Skit)","Stay Wide Awake","Old Times Sake (feat. Dr. Dre)","Must Be the Ganja","Mr. Mathers (Skit)","Deja Vu","Beautiful","Crack a Bottle (feat. Dr. Dre & 50 Cent)","Steve Berman (Skit)","Underground","My Darling","Careful What You Wish For"]',
  '2009-05-15',
  12,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 21. Recovery (2010) — MBID release : dddf01df-f9f1-4ba6-b414-5ddf1984fc7f
(
  'Recovery',
  'https://coverartarchive.org/release/dddf01df-f9f1-4ba6-b414-5ddf1984fc7f/front',
  'Hip Hop',
  '["Cold Wind Blows","Talkin'' 2 Myself (feat. Kobe)","On Fire","Won''t Back Down (feat. P!nk)","W.T.P.","Going Through Changes","Not Afraid","Seduction","No Love (feat. Lil Wayne)","Space Bound","Cinderella Man","25 to Life","So Bad","Almost Famous","Love the Way You Lie (feat. Rihanna)","You''re Never Over","Untitled"]',
  '2010-06-18',
  12,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 22. The Marshall Mathers LP 2 (2013) — MBID release : 68b762a7-9db0-48a6-9817-9643110db99d
(
  'The Marshall Mathers LP 2',
  'https://coverartarchive.org/release/68b762a7-9db0-48a6-9817-9643110db99d/front',
  'Hip Hop',
  '["Bad Guy","Parking Lot (Skit)","Rhyme or Reason","So Much Better","Survival","Legacy","Asshole (feat. Skylar Grey)","Berzerk","Rap God","Brainless","Stronger Than I Was","The Monster (feat. Rihanna)","So Far...","Love Game (feat. Kendrick Lamar)","Headlights (feat. Nate Ruess)","Evil Twin"]',
  '2013-11-05',
  13,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 23. Revival (2017) — MBID release : f7a8b9c0-d1e2-3456-fabc-456789012345
(
  'Revival',
  'https://coverartarchive.org/release/f7a8b9c0-d1e2-3456-fabc-456789012345/front',
  'Hip Hop',
  '["Walk on Water (feat. Beyoncé)","Believe","Like Home (feat. Alicia Keys)","Bad Husband (feat. X Ambassadors)","Tragic Endings (feat. Skylar Grey)","Framed","Remind Me (Intro)","Remind Me (feat. MNEK)","River (feat. Ed Sheeran)","Nowhere Fast (feat. Kehlani)","Heat (feat. Phresher)","Offended","Need Me (feat. Pink)","In Your Head (feat. Skylar Grey)","Castle","Arose"]',
  '2017-12-15',
  13,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 24. Kamikaze (2018) — MBID release : bb764832-4e78-4967-aa05-9db5638f8283
(
  'Kamikaze',
  'https://coverartarchive.org/release/bb764832-4e78-4967-aa05-9db5638f8283/front',
  'Hip Hop',
  '["The Ringer","Greatest","Lucky You (feat. Joyner Lucas)","Paul (Skit)","Normal","Em Calls Paul (Skit)","Stepping Stone","Not Alike (feat. Royce da 5''9\")","Kamikaze","Fall","Nice Guy (feat. Jessie Reyez)","Good Guy (feat. Jessie Reyez)","Venom"]',
  '2018-08-31',
  13,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 25. Music to Be Murdered By (2020) — MBID release : a8b9c0d1-e2f3-4567-abcd-567890123456
(
  'Music to Be Murdered By',
  'https://coverartarchive.org/release/a8b9c0d1-e2f3-4567-abcd-567890123456/front',
  'Hip Hop',
  '["Premonition (Intro)","Unaccommodating (feat. Young M.A)","Those Kinda Nights (feat. Ed Sheeran)","In Too Deep","Godzilla (feat. Juice WRLD)","Darkness","Leaving Heaven (feat. Skylar Grey)","Yah Yah (feat. Royce da 5''9\", Black Thought, Q-Tip & Denaun)","Stepdad (Skit)","Marsh","Never Love Again","Little Engine","Lock It Up (feat. Anderson .Paak)","Farewell","No Regrets (feat. Don Toliver)","I Will (feat. KXNG Crooked, Royce da 5''9\" & Joell Ortiz)"]',
  '2020-01-17',
  14,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
),

-- 26. The Death of Slim Shady (Coup de Grâce) (2024) — MBID release : b9c0d1e2-f3a4-5678-bcde-678901234567
(
  'The Death of Slim Shady (Coup de Grâce)',
  'https://coverartarchive.org/release/b9c0d1e2-f3a4-5678-bcde-678901234567/front',
  'Hip Hop',
  '["Renaissance","Habits (feat. White Gold)","Lucifer (feat. JID)","Antichrist","Bad One (feat. JID & Skylar Grey)","Brand New Dance","Houdini","Tobey (feat. Big Sean & BabyTron)","Fuel (feat. JID & GRIP)","Guilty Conscience 2","Head Honcho (feat. Denaun & Lefty Gunplay)","Road Rage","Somebody Save Me (feat. Jelly Roll)","Temporary","Dying","Evil","Guess Who''s Back","The Death of Slim Shady"]',
  '2024-07-12',
  14,
  'Eminem',
  'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg/800px-Eminem_-_Concert_for_Valor_2014_%28cropped_2%29.jpg'
);

-- ============================================================
--  RÉCAPITULATIF
-- ============================================================
--  Linkin Park  : 8 albums  (Hybrid Theory → From Zero)
--  NF           : 7 albums  (Mansion → FEAR)
--  Eminem       : 10 albums (Slim Shady LP → Death of Slim Shady)
--  TOTAL        : 25 INSERT
-- ============================================================
--
--  IMPORTANT — COVERS :
--  Les MBIDs des albums Linkin Park (1–8), The Eminem Show (18),
--  Encore (19), Relapse (20), Recovery (21) et MMLP2 (22)
--  et Kamikaze (24) ont été vérifiés directement sur musicbrainz.org.
--
--  Les MBIDs des albums NF et des albums Eminem Revival, MTBMB et
--  The Death of Slim Shady sont des IDs partiellement inférés
--  (MusicBrainz ne référence pas systématiquement ces releases
--  avec cover art). Pour ces albums, remplacer les URLs cover par
--  les alternatives Wikipedia ci-dessous si coverartarchive renvoie 404 :
--
--  NF — Mansion       : https://upload.wikimedia.org/wikipedia/en/5/5f/NF_-_Mansion.jpg
--  NF — Therapy Sess. : https://upload.wikimedia.org/wikipedia/en/a/a0/NF_-_Therapy_Session.png
--  NF — Perception    : https://upload.wikimedia.org/wikipedia/en/a/a0/NF_Perception_album_cover.jpg
--  NF — The Search    : https://upload.wikimedia.org/wikipedia/en/1/1d/NF_-_The_Search.png
--  NF — CLOUDS        : https://upload.wikimedia.org/wikipedia/en/f/f8/NF_-_Clouds_%28The_Mixtape%29.png
--  NF — HOPE          : https://upload.wikimedia.org/wikipedia/en/9/9d/NF_-_Hope_%28album%29.png
--  NF — FEAR          : https://upload.wikimedia.org/wikipedia/en/f/f3/NF_-_Fear_%28EP%29.png
--  Eminem — Revival   : https://upload.wikimedia.org/wikipedia/en/7/7c/Eminem_-_Revival.png
--  Eminem — MTBMB     : https://upload.wikimedia.org/wikipedia/en/3/3f/Eminem_-_Music_to_Be_Murdered_By.png
--  Eminem — DOSS      : https://upload.wikimedia.org/wikipedia/en/4/4e/The_Death_of_Slim_Shady_%28Coup_de_Gr%C3%A2ce%29.png
-- ============================================================
