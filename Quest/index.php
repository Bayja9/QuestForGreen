<!DOCTYPE html>
<html>
    <?php 
        require "../includes/header.php";
        require "../includes/BDDConnection.php";

        $requete = $bdd->prepare("SELECT quetes.id_quetes,id_quetes_utilisateur,nom_quetes,description_quetes,amount_done_utilisateur,amount_quetes,etat_quetes,periode_quetes FROM quetes,quetes_utilisateur WHERE quetes.id_quetes = quetes_utilisateur.id_quetes AND quetes_utilisateur.id_utilisateur = :id");
        $requete->bindParam(':id', $_SESSION["id"]);
        $requete->execute();
        $Quetes_Util = $requete->fetchAll();

        function writeQuest($iquetes)
        {
            if ($iquetes["amount_done_utilisateur"] == $iquetes["amount_quetes"]) {
                echo "<div class=\"done\" onclick=\"validate(this)\">";
            }

            echo "<label id=\"questTitle\" data-questTitle=".$iquetes["nom_quetes"]." data-userQuestID=".$iquetes["id_quetes_utilisateur"].">".$iquetes["nom_quetes"]."</label>
                    <br>
                    <label id=\"questInfo\">".$iquetes["description_quetes"]."</label>";

            if ($iquetes["amount_done_utilisateur"] != $iquetes["amount_quetes"]){
                echo "<i class=\"plus fas fa-plus\" data-utilisateur=".$_SESSION["id"]." data-questID=".$iquetes["id_quetes"]." data-newAmount=".$iquetes["amount_done_utilisateur"]." data-amountDone=".$iquetes["amount_done_utilisateur"]." data-amount=".$iquetes["amount_quetes"]." onclick=\"add(this)\"></i>";
            }
            echo "<label id=\"questValue\">".$iquetes["amount_done_utilisateur"]."/".$iquetes["amount_quetes"]."</label>";
            if ($iquetes["amount_done_utilisateur"] != $iquetes["amount_quetes"]){
                echo "<i class=\"moin fas fa-minus\" onclick=\"supp(this)\"></i>";
            }

            if ($iquetes["amount_done_utilisateur"] == $iquetes["amount_quetes"]){
                echo "</div>";
            }
        }
    ?>
    <LINK rel="stylesheet" href="../resources/css/quest.css"/>
    <title>QuestForGreen - Quest</title>
    <body>
        <div id="background">
            <svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" height="600" width="600" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                <g transform="translate(0 -452.36)">
                    <g transform="matrix(1.1719 0 0 1.1901 .0000012857 443.32)">
                        <path d="m0 256v-256h256 256v256 256h-256-256v-256z" fill="#96642c"/>
                        <path fill="#8c5829" d="m6.8143 501.4c1.6784-123.55 12.837-247.16 3.7917-370.67-1.6764-43.565-3.3106-86.946-3.7207-130.54 11.824 34.893 4.1237 72.066 8.0547 108.01.60468 95.044 8.9642 190.32-.78216 285.16-2.341 36.731-3.8412 73.527-3.8271 110.34-2.6654 8.9807-5.2046 1.9548-3.5165-2.2947zm35.125-25.15c-3.179-125.7-9.012-251.66.349-377.23.092-33.006-1.399-66.074 1.236-99.02.40029 115.88 3.2765 218.66-2.8224 328.56 6.6409 65.97.29866 101.84 8.3481 155.6 1.1935 22.219-12.517 19.49-7.0943-.57906l.05501-3.6684zm10.498 32.5c-4.728-177.23-3.952-333.12-.185-496.2 14.787-3.9378 1.0795 33.058 5.2627 44.161-12.609 156.39 5.7067 302.75 1.7644 447.87-.93758 2.6058-3.7226 5.5428-6.842 4.1718zm12.043-6.7502c4.606-39.39 2.294-79.04-2.14-118.29-6.205-89.43-6.656-179.17-1.85-268.67 1.466-34.208-.025-69.561 5.559-102.96 5.268 18.734-.984 41.842-.843 62.327-1.55 24.817-2.751 49.713-1.544 74.573 5.35-47.15 1.795-94.968 9.52-141.9-1.506 67.218-8.65 134.23-8.433 201.53-1.3387 73.723 4.0988 147.37 12.6 220.53 1.2796 21.885.49109 60.196-2.4882 71.842-1.965-35.12 3.498-70.53-3.531-105.35-13.278-364.96-12.07-165.81.341 62.74-.43019 10.898 2.7794 45.058-7.1908 43.625zm-5.876-243.73c-3.0922 1.8163 3.2473 2.117 0 0zm33.89 251.19c4.425-77.77 2.776-155.73 6.418-233.54-22.893-60.04-14.117-125.35-10.715-187.84 8.721-22.85-8.336-74.557 12.203-79.139 4.531 40.003-7.3484 81.614 7.4198 120.54 11.974 25.458 13.775 53.397 12.792 81.153-4.8741 56.428 3.6921 127.48 11.28 190.78 3.1459 28.045 2.5397 56.222 5.1625 84.269 1.124 13.766-11.902 25.17-9.0542 4.0864-1.9295-29.52 2.8974-59.823-3.0796-88.867-20.623-2.2293-10.912 36.585-16.33 51.892-3.7655 18.858-.7261 44.373-12.081 58.666l-2.2887-.70552-1.7243-1.2879zm12.916-6.96c6.58-17.962.54699-66.886 16.939-66.208 3.2999 18.631 4.5318 53.828-.78751 62.681-1.3409-11.773 8.7762-49.667-7.2466-43.942-2.1392 14.22.63409 32.618-8.9046 47.469zm32.202 2.75c6.9793-76.491-4.4534-152.84-12.463-228.75-3.411-43.114-3.244-86.448-.95965-129.62-1.275-16.683-33.837-41.094-3.3051-41.474 9.5105-23.074-1.6144-48.772 1.1859-72.994 7.7925-38.624-8.461 33.789 9.9914 23.083.96897-11.832 6.4405-55.829 3.7019-22.398-11.982 108.2-17.345 218.41 2.5089 326.03 3.6582 39.01 3.6692 78.232 6.142 117.32-7.8233 7.4463 1.5081 22.79-6.8021 28.809zm5.6312 1.25c7.9157-25.138.16479-52.147 10.028-76.391 3.094-13.963-8.7217-54.714-1.6937-54.075 6.2425 42.613 4.2618 86.333-4.5438 128.25-.46325 1.9599-2.2665 1.792-3.7907 2.2123zm10.096 2.75c7.6755-26.102 4.4562-53.859 11.365-79.603-4.8938-88.305-24.949-176.65-23.29-259.32 3.2151-29.474-8.6239-60.189 4.2509-88.622 2.9457-22.438-4.532-50.67 5.37-68.464 15.181-25.055 3.8996 23.093 3.2487 32.228-8.4183 70.816-1.8641 117.84-3.3694 213.6 17.979 65.9 21.922 133.4 18.675 196.44-2.5582 12.532-4.7868 57.899-16.251 53.737zm38.261-6.5c5.8752-82.585 8.265-165.84-1.4217-248.24-2.9019 21.359-18.936 19.28-16.385-1.507-8.5391-44.68-17.351-91.262-4.4357-136.07 6.5386-29.721 16.617-58.917 18.188-89.525-4.202 8.26-14.673 46.27-8.3137 18.053-3.4416-11.568 15.979-52.29 14.283-21.81-2.1155 9.3007-9.4872 45.923-1.9641 39.745 2.6165-19.805-.73165-69.771 32.023-55.181 3.1544 35.664 4.5946 71.495 13.838 106.2-.32125 24.37 2.1102 57.667-12.691 76.003-8.2409-17.686 1.0899-45.603-13.005-58.379-18.686 32.417-4.312 49.207-7.1767 106.3-14.467 95.279 24.029 177.94 6.0477 266.79-3.9249-19.871-1.7575 10.484-6.4627-8.6764-3.1509-27.773 4.6472-55.988-4.6351-83.321-1.9273 29.802 7.5691 61.39-3.2442 90.315-5.7016 7.7385-4.7815 6.9607-4.645-.70374zm2.0057 2.5208c-3.0923 1.8163 3.2473 2.117 0 0zm7.0304-183.36c.30338-40.418-4.5346-92.033-7.6981-138.11-6.3417 8.397-7.3593 49.613-16.737 20.717-13.08-32.332 1.7725-66.349 11.635-97.324 4.8771-12.577-7.252-23.89-5.991-5.1611-8.0948 33.416-16.818 68.093-10.831 102.62-6.0313 21.587 20.958 33.752 21.243 11.959 6.5585 21.466 2.7681 45.281 6.0126 67.675 1.3275 25.592 1.9898 51.242 1.0273 76.86 1.5886-13.023.76792-26.166 1.3391-39.24zm-19.289-90.452c-2.8098-7.622 3.8112 4.1307 0 0zm33.474 271.04c-7.456-11.866 13.136-37.835 10.308-11.258 1.7931 7.5676-5.302 32.212-10.308 11.258zm13.16 8.25c3.3281-36.091-7.904-71.1-14.102-106.09-6.0956-74.271-10.707-149.43.12793-223.51 6.6915 5.1061 5.0522 49.114 14.632 29.026-1.2831-19.782 22.345-22.186 14.812.35181 5.5978 87.307 3.014 174.87 7.0056 262.24-6.4502-87.502-2.2421-175.48-10.546-262.88-14.248-6.6918-9.4765 44.191-22.06 17.023-12.612 38.854-6.7263 80.396-6.6181 120.46 3.4416 53.39 20.757 105.77 17.423 159.51zm25.566-26.5c-4.2194-65.566-5.7766-202.21-5.0257-303.65 7.02-59.598 10.791-119.88 5.7237-179.8 12.267 8.1926 2.0596 56.021 5.3445 21.018-1.4762-17.208 3.8795-18.466 2.5421-.81751-1.1683 61.606 2.0759 123.33-3.9253 184.78-2.0509 26.634 3.3331 52.874-1.1935 79.44-1.2598 73.539 5.137 147.02 4.4523 220.58-11.967 12.023-5.9967-16.65-7.918-21.552zm6.0394-8c-1.7306-14.482.0119-33.635-3.3208-45.221 1.0073 15.061-1.7861 30.643 3.3208 45.221zm13.299 33c-4.4426-78.11-1.9445-158.25-.48398-254.51 5.3151-69.448 11.485-139.38 2.459-208.81-2.8165-11.423 1.2812-58.307 3.8964-26.381 2.3967 39.385 4.0627 78.844 4.9146 118.3.17638 24.683-.19834 49.364-.50872 74.044 12.41-26.934 3.5229-57.918 6.1377-86.494-2.9607-34.912-3.5827-69.951-7.4495-104.7 9.3203-28.143 11.246 17.257 11.119 27.088 9.21 167.22-13.286 310.48-4.2743 461.46-22.072-95.888.31655-202.1-1.8334-292.62-13.288 34.965-3.817 66.052-11.49 122.71-1.1376 40.066-.3334 80.212 3.1391 120.15-11.518 17.904 13.867 33.03-5.6257 49.775zm41.186.5c-1.8814-42.287-12.358-83.945-9.8197-126.47-2.5729-122.29 9.1637-244.28 9.6891-366.53 9.7864-13.416 1.6916 30.528 2.4289 38.892-2.361 105.02-12.197 233.98-7.8488 351.65-3.2662 29.054 14.115 48.168 10.692 76.789-.77837 8.4086 7.3991 22.393-5.1417 25.675zm10.415-2.5c5.2934-44.249-4.9632-88.016-12.162-131.32-5.7934-58.265-1.1666-116.81.20906-175.17 6.1741 32.721-.10049 66.239 2.103 99.317-.12483 38.867 6.9953 77.176 13.135 115.32 2.3788 30.908 2.1949 62.067-1.4712 92.868l-1.1971.11927zm7.8837 3.2304c2.904-62.973 1.8064-126.6-11.188-188.44-5.0673-90.85-3.6527-182.2 7.7057-272.55-.71551-11.295-2.5077-49.041 14.404-37.913-1.2484 44.103-10.981 87.366-15.517 131.11-4.1094 150.87-2.3505 145.67 9.2654 191.47 2.5039 36.091 5.8708 72.559 5.9104 108.55-1.4848 22.941 7.7697 53.416-9.7028 66.913l-.31133.83993-.56598.0324zm15.99-68.98c1.5819-122.52-16.229-245.44.0659-367.56.01-16.439-1.273-60.105 3.9933-59.1-4.6046 111.34-10.617 222.94-2.464 334.26 1.8394 53.9 3.2333 107.83 2.5706 161.77-11.068-21.861-.32865-46.404-4.1658-69.376zm37.268 65.75c-.085-36.525 2.2162-73.034 6.2906-109.32 29.176 11.87 3.9328 49.079 9.5134 72.245-.45821 10.809 4.9228 45.08-15.804 37.079zm22.712 0c2.2459-12.724 5.0989-55.084 5.0672-21.311-.15453 7.3299-1.2016 14.93-5.0672 21.311zm31.552-3c-1.8686-128.49 20.836-257.1 4.0844-385.36-6.439-38.43-5.3879-77.314-3.8693-116.09 10.914 46.484 1.1245 96.792 9.1032 110.27 8.134 103 2.6237 206.36 1.1352 309.49-5.4687 27.125-2.3199 63.442-9.7756 85.429zm7.482-5c4.1164-33.418 14.722-66.42 8.0438-100.28-1.8106-81.171.0183-162.36.34586-243.53 1.3954 110.76 1.366 221.84 2.384 332.42.1606 7.1573-13.246 33.002-10.774 11.398zm8.2252-125.98c-3.0923 1.8163 3.2473 2.117 0 0zm16.608 115.51c5.3442-7.9098-5.2672-25.516-3.9657-6.6366 4.0483-67.882 11.287-136.44-.43743-203.97-3.112-59.168 2.573-118.39 1.412-177.65 2.2876-31.776-4.1165-66.116 4.9625-96.33 24.308-17.71 47.477 13.077 33.68 35.054 5.356 142.29 3.7322 284.71 2.4849 427.07 4.0139 20.134-6.7598 47.755-28.903 44.544-8.5136-3.5327-11.953-13.841-9.2331-22.087zm24.14-258.78c2.9765-63.817.90931-127.79-4.3387-191.44-12.492 24.572-2.4148 54.173-7.0552 80.695.33707 39.524 4.0331 78.963 9.7686 118.05.98038-2.3605 1.4728-4.7623 1.6253-7.3094zm-4.2831-9.4167c-1.3023-5.882 2.2803 1.8534 0 0zm17.525-96.312c-3.0923 1.8163 3.2473 2.117 0 0zm0-4c-3.0923 1.8163 3.2473 2.117 0 0zm-189.53 385.31c-1.3023-5.882 2.2803 1.8534 0 0zm-106.31-16.349c-5.1998-10.991 5.1196-.31473 0 0zm155.93-15.42c-13.027 2.8601 5.5943-20.978-9.077-12.262-2.2304-98.242-7.7917-196.49-6.4866-294.77 1.0834-25.638 4.3234-51.529 3.7146-76.958 15.618-19.028 10.098 23.307 13.74 34.129 1.3681 25.262 5.4087 50.115 11.002 74.683 14.127 57.126 19.2-58.224 22.851-77.716 4.8688-19.869-1.337-48.594 13.329-62.845 8.0537 21.594 6.4441 46.133 11.204 68.822 9.6672 76.18 12.966 154.72-2.3125 230.13-14.271-28.485-14.479-63.401-23.326-94.363 6.2231 20.138-10.51-17.431-10.756 7.9493-5.6101 40.494-10.868 81.078-16.488 121.6-3.5238 27.064-4.4953 54.742-6.3843 81.686l-1.0094-.0885zm-5.0811-86.538c-3.0923 1.8163 3.2473 2.117 0 0zm12.965-136.88c-4.8777-32.036-7.7602-64.371-13.83-96.223-10.144 32.581-4.5388 67.52-4.4916 101.09 1.4267 28.952.37404 58.122 4.916 86.845 20.886 13.332 14.012-83.322 13.406-91.714zm50.495 50.153c10.254-66.482 3.9743-134.29-8.1326-200.08-20.221 27.952-8.8552 63.891-14.174 95.514 1.8651 35.652 6.0387 72.245 22.306 104.56zm-276.08 172.52c-1.5635-7.663 3.6079 2.9801 0 0zm192.62-13.81c1.2852-13.411 1.8206 6.8683 0 0zm88.715-23.759c-2.505-14.372 4.3089-18.897 2.173-.72406.35584 12.562-3.8667 21.342-2.173.72406zm-20.449 16.318c-4.7256-12.203 2.302-39.546 1.206-10.868.047 3.645-.0345 7.3709-1.206 10.868zm-294.89-7.25c-1.2572-6.0804 3.19 2.8566 0 0zm161.19-5.06c-.11365-7.6687 1.4032 4.1773 0 0zm.0774-7.5c.75595-8.1264.75595 8.1264 0 0zm-145.19-1.4167c-1.3023-5.882 2.2803 1.8534 0 0zm145.15-6.58c.54961-6.8903.54961 6.8903 0 0zm-272.96-34.5c9.3987-119.26-1.1861-102.54 1.6233-3.73-.3118 8.81-2.0793 21.54-1.6233 3.73zm225.32 7.8732c.16656-18.87-12.146-67.601.49774-69.034 5.3888 22.42 10.012 44.973-.49774 69.034zm-187.94-17.12c-2.7286-24.204 3.8813-10.842.79153 5.4281zm4.015-23.917c-6.8314-4.1098 2.2762-6.6657 0 0zm94.333-15.22c-7.9961-51.204-7.7616-103.31-9.0726-155.01-.85321-54.347-4.8172-66.827 9.5815-172.57 6.2312 12.661-7.253 51.423-5.6843 73.579-2.4418 54.473-1.3542 109.1-.44951 163.58 13.904 26.911-19.879 73.65 5.625 90.411zm-101-66.78c-27.333 158.3-13.667 79.149 0 0zm148.39-14.75c-7.0815-5.5382 2.7399-7.2581 0 0zm92.685-30.001c-1.3023-5.882 2.2803 1.8534 0 0zm1-15c-1.3023-5.882 2.2803 1.8534 0 0zm-47-5c-1.3023-5.882 2.2803 1.8534 0 0zm200.92-14.14c3.8083-3.6006-.75385 6.9169 0 0zm-123.38-32.44c1.0242-51.604 3.1997-103.32 10.598-154.45 8.0933 27.809-7.0032 55.371-5.5553 83.467-1.8771 28.732-1.0874 57.663-5.1215 86.234-.3779-5.0811.11282-10.166.079-15.25zm197.45-8.4167c-1.3023-5.882 2.2803 1.8534 0 0zm-56.426-1.3354c-1.6491-38.762-9.5992-59.871-7.6601-142.93 13.432 3.7668 2.7812 39.721 6.6732 55.558.92313 29.101 4.3366 58.306.98691 87.376zm-2.0491-93.977c-3.0923 1.8163 3.2473 2.117 0 0zm58.68 86.737c.75595-8.1264.75595 8.1264 0 0zm-296.8-9.1007c-3.2541-13.074 3.9031 4.9153 0 0zm29.53-1.81c-5.41-40.435-10.33-80.937-15.03-121.46 11.342 19.39 5.6354 46.11 9.6796 68.329-1.0296 13.468 13.386 28.933 13.794 6.0984 3.3325-19.533-3.662-59.538.103-66.735 1.5822 37.562 4.3534 75.935-5.255 112.73 2.504-9.7228-1.1806.9922-3.2917 1.039zm96.667-.75811c.68618-21.219 3.7803-67.731 6.1727-72.615-.55773 24.305-3.0488 48.52-6.1727 72.615zm-180.41-5.62c.63451-12.321 10.085-40.219 5.2536-11.541-.63637 4.2001-2.0014 8.5792-5.2536 11.541zm349.74-14.21c1.2808-8.5005 1.5294 9.7299 0 0zm-264.86-10.41c-2.9166-4.7183 5.5545 1.9185 0 0zm265.11-10.59c.28529-9.3558.9918 6.1152 0 0zm-400.25-6.451c-6.37-41.204 3.36-106.66 7.3-32.543-1.33 10.862-1.66 22.856-7.3 32.543zm278.58-13.271c.87-18.835-14.6-66.11 8.73-64.037 6.03 21.837-7.16 42.595-8.73 64.037zm33.494-.19446c-1.3023-5.882 2.2803 1.8534 0 0zm-193.43-5.084c2.0221-4.3555.78979 7.2532 0 0zm-111.56-13.917c-1.3023-5.882 2.2803 1.8534 0 0zm211-26c-1.3023-5.882 2.2803 1.8534 0 0z"/>
                    </g>
                </g>
            </svg>
        </div>
        <div id="retour" onclick="back()">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="300" height="300" viewBox="0 0 300 300" xml:space="preserve">
            <desc>Created with Fabric.js 4.2.0</desc>
            <defs>
            </defs>
            <rect x="0" y="0" width="100%" height="100%" fill="transparent"></rect>
            <g transform="matrix(1 0 0 1 150 150)" id="49280fde-27f3-44aa-a689-915442b419b7"  >
            <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1; visibility: hidden;" vector-effect="non-scaling-stroke"  x="-150" y="-150" rx="0" ry="0" width="300" height="300" />
            </g>
            <g transform="matrix(Infinity NaN NaN Infinity 0 0)" id="962bad33-fadf-4549-b5f3-801d23f8bdab"  >
            </g>
            <g transform="matrix(3.95 0 0 3.95 150 150)" id="d7b2af99-7917-4ce8-ac2e-7fced58e2915"  >
            <path style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(181,181,181); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke"  transform=" translate(-48.78, -49.51)" d="M 52.122 73.982 L 11.063 50.273 L 44.59 16.744 L 44.59 32.771 C 81.936 31.042 89.263 52.512 85.701 82.27600000000001 C 79.695 61.46600000000001 68.148 50.22300000000001 48.55899999999999 52.97000000000001 L 52.122 73.982 z" stroke-linecap="round" />
            </g>
            </svg>
        </div>
        
        <div id="blockLivre">
            <div id="livre">
                <div id="blockpage1" class="blockpage">
                    <div>
                        <h2>Quêtes</h2>
                        <div id="page1" class="page">
                            <div id="pageblock">
                                <div id="ligne"></div>
                                <h4>Principales</h4>
                                <!-- mettre ici la quetes principales -->
                                <?php
                                $pdq = true;
                                if ($Quetes_Util) {
                                    $principale = 0;
                                    foreach ($Quetes_Util as $quetes) {
                                        if ($quetes["periode_quetes"] == "Principal") {
                                            if ($quetes["etat_quetes"] == 0) {
                                                $principale++;
                                                writeQuest($quetes);
                                                $pdq = false;
                                            }
                                        }
                                        if ($principale == 1) {
                                        break;
                                        }
                                    }
                                }
                                if($pdq){
                                    echo "<label id=\"noquest\"> Il n'y a pas de quete Principales pour vous</label>";
                                }
                                ?>
                                <div id="ligne"></div>
                                <h4>Journalière</h4>
                                <?php
                                $pdq = true;
                                if ($Quetes_Util) {
                                    $journaliere = 0;
                                    foreach ($Quetes_Util as $quetes) {
                                        if ($quetes["periode_quetes"] == "Journaliere") {
                                            if ($quetes["etat_quetes"] == 0) {
                                                $journaliere++;
                                                writeQuest($quetes);
                                                $pdq = false;
                                            }
                                        }
                                        if ($journaliere == 5) {
                                        break;
                                        }
                                    }
                                }else {
                                    echo "<label id=\"noquest\"> Il n'y a pas de quete Journalière pour vous</label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="blockpage2" class="blockpage" >
                    <div id="page2" class="page" onmousedown="turnPageON(event)">
                    <div id="ligne"></div>
                    <h4>Hebdomadaire</h4>
                    <?php
                        $pdq = true;
                        if ($Quetes_Util) {
                            $hebdo = 0;
                            foreach ($Quetes_Util as $quetes) {
                                if ($quetes["periode_quetes"] == "Hebdomadaire") {
                                    if ($quetes["etat_quetes"] == 0) {
                                        $hebdo++;
                                        writeQuest($quetes);
                                        $pdq = false;
                                    }
                                }
                                if ($hebdo == 7) {
                                break;
                                }
                            }
                        }else {
                            echo "<label id=\"noquest\"> Il n'y a pas de quete Hebdomadaire pour vous</label>";
                        }
                    ?>
                    </div>
                </div>
                <div id="blockpage3" class="blockpage">
                    <div id="page3" class="page" onmousedown="turnPageON(event)">
                    <div id="ligne"></div>
                    <h4>Mensuel</h4>
                    <?php
                        $pdq = true;
                        if ($Quetes_Util) {
                            $Mensu = 0;
                            foreach ($Quetes_Util as $quetes) {
                                if ($quetes["periode_quetes"] == "Mensuel") {
                                    if ($quetes["etat_quetes"] == 0) {
                                        $Mensu++;
                                        writeQuest($quetes);
                                        $pdq = false;
                                    }
                                }
                                if ($Mensu == 4) {
                                break;
                                }
                            }
                        }else {
                            echo "<label id=\"noquest\"> Il n'y a pas de quete Mensuel pour vous</label>";
                        }
                    ?>
                    </div>
                </div>
                <div id="blockpage4" class="blockpage">
                    <div id="page4" class="page">
                    <div id="ligne"></div>
                    <h4>Accomplies</h4>
                    </div>
                </div>
                <div id="formQuete" class="blockpage">
                    <div id="ligne"></div>
                    <h2 id="h2quest"></h2>
                    <div id="uploadIMG">
                        <input id="image" type="file" name="image_valid_quete" accept="image/*">
                        <label id="imgLabel" for="image"><span>Choisissez une image</span></label>
                        <img id="preview" src="//via.placeholder.com/300x300">
                    </div>
                    <textarea id="desctext" type="text" name="description_quete" maxlength = "512" placeholder="Entrez une description de ce que vous avez accompli ..."></textarea>
                    <button id="annuler" onclick="annuler()">Annuler</button>
                    <button id="valider" onclick="validateQuest()">Valider</button>
                </div>
            </div>
        </div>
        </div>
        <button id="confirmer" onclick="confirme()" hidden > Confirmer les changements </button>
        <?php require "../includes/import-js.php" ?>
        <script>
            $(document).ready(function (e) {
                $('input[type="file"]').on('change', (e) => {
                    let that = e.currentTarget
                    if (that.files && that.files[0]) {
                        $(that).next('.custom-file-label').html(that.files[0].name)
                        let reader = new FileReader()
                        reader.onload = (e) => {
                            $('#preview').attr('src', e.target.result)
                        }
                        reader.readAsDataURL(that.files[0])
                    }
                })
            });
            function back(){
                document.location.href = "/QuestForGreen/Home";
            };
            var deg = 0;
            var pos = 0;
            var lastpos = 0;
            var moving = false;
            var mouse = false;
            document.addEventListener('mousemove', (event) => {
                lastpos = pos;
                pos = event.clientX;
                if (mouse == true && moving == false) {
                    if (window.getSelection) {
                        if (window.getSelection().empty) {  // Chrome
                            window.getSelection().empty();
                        }
                    }
                    if (deg < 0) {
                        if (lastpos < pos) {
                            deg+=2;
                        }
                    }
                    else if (deg > 0) {
                        deg = 0;
                    }

                    if (deg > -180) {
                        if (lastpos > pos ) {
                            deg-=2;
                        }
                    }else if (deg < -180){
                        deg = -180;
                    }
                    document.querySelector("#blockpage2").style.transform = "rotateY("+deg+"deg)";
                    document.querySelector("#blockpage3").style.transform = "rotateY("+deg+"deg)";
                    if (deg < -90) {
                        document.querySelector("#blockpage3").style.zIndex = "3";
                    }
                    if (deg > -90) {
                        document.querySelector("#blockpage3").style.zIndex = "0";
                    }
                }
            });
            function turnPageON(event) {
                mouse = true;
            }
            document.addEventListener('mouseup', (event) => {
                mouse = false;
            });
            resetpage()
            function resetpage() {
                setTimeout(() => {
                if (mouse == false && moving == false) {
                    if (deg <= -90 && deg > -180) {
                        deg-=0.3;
                        document.querySelector("#blockpage2").style.transform = "rotateY("+deg+"deg)";
                        document.querySelector("#blockpage3").style.transform = "rotateY("+deg+"deg)";
                        document.querySelector("#blockpage3").style.zIndex = "3";
                    }
                    if (deg > -90 && deg < 0) {
                        deg+=0.3;
                        document.querySelector("#blockpage2").style.transform = "rotateY("+deg+"deg)";
                        document.querySelector("#blockpage3").style.transform = "rotateY("+deg+"deg)";
                        document.querySelector("#blockpage3").style.zIndex = "0";
                    }
                }
                resetpage();
            }, 1);
            }

            var confirm =  true;
            var quest = 0;
            //algo
            var amount = 0;
            var max_amount = 1; 
            //algo

            function add(elm) {
                amount = elm.getAttribute("data-newAmount");
                max_amount = elm.getAttribute("data-amount");
                if (amount != max_amount) {
                    elm.setAttribute("data-newAmount",++amount);
                    elm.nextElementSibling.innerHTML = amount+"/"+max_amount;
                }
                verif();
            }

            function supp(elm) {
                amount = elm.previousElementSibling.previousElementSibling.getAttribute("data-newAmount");
                max_amount = elm.previousElementSibling.previousElementSibling.getAttribute("data-amount");
                if (amount != 0) {
                    elm.previousElementSibling.previousElementSibling.setAttribute("data-newAmount",--amount);
                    elm.previousElementSibling.innerHTML = amount+"/"+max_amount;
                }
                verif();
            }
            var quests = 0;
            var confirmer = false;

            function verif() {
                quests = document.querySelectorAll(".plus");
                confirmer = false;
                quests.forEach(plusTag => {
                    if (plusTag.getAttribute("data-newAmount") != plusTag.getAttribute("data-amountDone")) {
                        document.querySelector("#confirmer"). removeAttribute("hidden","");
                        document.querySelector("#confirmer").style.opacity = "100%";
                        confirmer = true;
                    }
                    if (!confirmer){
                        document.querySelector("#confirmer").setAttribute("hidden","");
                        document.querySelector("#confirmer").style.opacity = "0%";
                    }
                });
            }

            function confirme() {
                var xmlhttp = new XMLHttpRequest();
                quests = document.querySelectorAll(".plus");
                quests.forEach(plusTag => {
                    if (plusTag.getAttribute("data-newAmount") != plusTag.getAttribute("data-amountDone")){
                        xmlhttp.open("GET", "modifQuest.php?idQuest="+plusTag.getAttribute("data-questid")+"&idUtilisateur="+plusTag.getAttribute("data-utilisateur")+"&newAmount="+plusTag.getAttribute("data-newAmount"), true);
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.location.href="/QuestForGreen/Quest/";
                            }
                        }
                        xmlhttp.send();
                        //quests = document.querySelectorAll(".plus");
                    }
                });
            }
            var deg2 = 0;
            var questid;
            var questTitle;
            function validate(elm) {
                questid = elm.firstChild.getAttribute("data-userQuestID");
                questTitle = elm.firstChild.innerHTML; 
                document.querySelector("#preview").setAttribute("data-userQuestID",questid)
                document.querySelector("#h2quest").innerHTML = questTitle;
                document.querySelector("#desctext").value = "";

                moving = true;
                pageDeuxEtTrois();
                function pageDeuxEtTrois(params) {
                    setTimeout(() => {
                        if (deg > -180) {
                            deg-=1.5;
                            document.querySelector("#blockpage2").style.transform = "rotateY("+deg+"deg)";
                            document.querySelector("#blockpage3").style.transform = "rotateY("+deg+"deg)";
                            if (deg < -90 ) { 
                                document.querySelector("#blockpage3").style.zIndex = "3"; 
                            }
                            if (deg > -90 ) { 
                                document.querySelector("#blockpage3").style.zIndex = "0"; 
                            }
                        }else{
                            deg = -180;
                            document.querySelector("#blockpage2").style.transform = "rotateY("+deg+"deg)";
                            document.querySelector("#blockpage3").style.transform = "rotateY("+deg+"deg)";
                            moving = false;
                            return 0;
                        }
                        pageDeuxEtTrois();
                    }, 1);
                    
                }
                setTimeout(() => {
                    pageQuatre();
                    function pageQuatre(params) {
                        setTimeout(() => {
                            if (deg2 > -180) {
                                deg2-=1.5;
                                document.querySelector("#blockpage4").style.transform = "rotateY("+deg2+"deg)";
                                if (deg2 < -90 ) { 
                                    document.querySelector("#blockpage4").style.zIndex = "3";
                                    document.querySelector("#page4 div").setAttribute("hidden","");
                                    document.querySelector("#page4 h4").setAttribute("hidden","");

                                }
                                if (deg2 > -90 ) { 
                                    document.querySelector("#blockpage4").style.zIndex = "0";
                                    
                                }
                            }else{
                                deg2 = -180;
                                document.querySelector("#blockpage4").style.transform = "rotateY("+deg2+"deg)";
                                moving = false;
                                return 0;
                            }
                            pageQuatre();
                        }, 1);
                        
                    }        
                }, 200);
            }

            function annuler() {
                moving = true;
                pageQuatre();
                    function pageQuatre(params) {
                        setTimeout(() => {
                            if (deg2 < 0) {
                                deg2+=1.5;
                                document.querySelector("#blockpage4").style.transform = "rotateY("+deg2+"deg)";
                                if (deg2 < -90 ) { 
                                    document.querySelector("#blockpage4").style.zIndex = "3";
                                    
                                }
                                if (deg2 > -90 ) { 
                                    document.querySelector("#blockpage4").style.zIndex = "0";
                                    document.querySelector("#page4 div").removeAttribute("hidden","");
                                    document.querySelector("#page4 h4").removeAttribute("hidden","");
                                }
                            }else{
                                deg2 = 0;
                                document.querySelector("#blockpage4").style.transform = "rotateY("+deg2+"deg)";
                                moving = false;
                                return 0;
                            }
                            pageQuatre();
                        }, 1);
                        
                    }    
                setTimeout(() => {
                    pageDeuxEtTrois();
                    function pageDeuxEtTrois(params) {
                        setTimeout(() => {
                            if (deg < 0) {
                                deg+=1.5;
                                document.querySelector("#blockpage2").style.transform = "rotateY("+deg+"deg)";
                                document.querySelector("#blockpage3").style.transform = "rotateY("+deg+"deg)";
                                if (deg < -90 ) { 
                                    document.querySelector("#blockpage3").style.zIndex = "3"; 
                                }
                                if (deg > -90 ) { 
                                    document.querySelector("#blockpage3").style.zIndex = "0"; 
                                }
                            }else{
                                deg = 0;
                                document.querySelector("#blockpage2").style.transform = "rotateY("+deg+"deg)";
                                document.querySelector("#blockpage3").style.transform = "rotateY("+deg+"deg)";
                                moving = false;
                                return 0;
                            }
                            pageDeuxEtTrois();
                        }, 1);
                        
                    }
                }, 200);
            }
            var prev = document.querySelector("#preview");
            var text = document.querySelector("#desctext");
            function validateQuest() {
                img = document.querySelector("#image");
                text = document.querySelector("#desctext");
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "validateQuest.php?nomIMG="+img.files[0].name+"&descIMG="+text.value+"&idUtil="+<?php echo $_SESSION["id"]?>+"&idQuetesUtil="+prev.getAttribute("data-userquestid"), true);
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // document.querySelector("#valider").innerHTML = this.responseText
                        document.location.href="/QuestForGreen/Quest/";
                    }
                }
                xmlhttp.send();
            }
        </script>
    </body>
</html>